<?php

class Attempts_Table extends DB_Table {
    public function __construct() {
        parent::__construct('attempts');
    }

    public function get_attempts($problem_id, $user_id) {
        $query = 'select * from attempts where problem_id  = ? and user_id = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$problem_id, $user_id]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param $user_id
     * @return array|false [verdict,count]
     */
    public function get_all_verdicts($user_id){
        $query = 'select * from getVerdictsSection (?)';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$user_id]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
}