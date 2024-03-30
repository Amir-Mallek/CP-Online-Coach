<?php

class Hints_Table extends DB_Table {
    public function __construct() {
        parent::__construct('hints');
    }

    public function get_hints ($problem_id) {
        $query = 'select * from hints where problem_id  = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$problem_id]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_description($hint_id) {
        $query = 'select * from hints where id  = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$hint_id]);
        return $response->fetchAll(PDO::FETCH_OBJ)[0]->description;
    }

}