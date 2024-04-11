<?php

class Problems_Table extends DB_Table {
    public function __construct() {
        parent::__construct('problems');
    }

    public function get_problem($problem_id) {
        $query = 'select * from problems where id = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$problem_id]);
        if ($response->rowCount() == 0) {
            header('location: ../pages/levels.php');
            exit;
        }
        return $response->fetchAll(PDO::FETCH_OBJ)[0];
    }

    public function get_problems($level_id) {
        $query = 'select * from problems where level_id  = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$level_id]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    private function get_total_attempts($problem_id) {
        $query = 'select * from problems where id  = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$problem_id]);
        return $response->fetchAll(PDO::FETCH_OBJ)[0]->total_attempts;
    }

    private function get_ac_attempts($problem_id) {
        $query = 'select * from problems where id  = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$problem_id]);
        return $response->fetchAll(PDO::FETCH_OBJ)[0]->ac_attempts;
    }

    public function update_acceptance($problem_id, $verdict) {
        $total_attempts = $this->get_total_attempts($problem_id) + 1;
        $ac_attempts = $this->get_ac_attempts($problem_id) + $verdict;
        $query = 'update problems set total_attempts = ?, ac_attempts = ? where id = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$total_attempts, $ac_attempts, $problem_id]);
    }

    public function get_acceptance($problem_id) {
        $total_attempts = $this->get_total_attempts($problem_id);
        $ac_attempts = $this->get_ac_attempts($problem_id);
        if ($total_attempts == 0) return 0;
        return ($ac_attempts/$total_attempts) * 100;
    }
}