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
}