<?php

class Hints_Table extends DB_Table {
    public function __construct() {
        parent::__construct('hints');
    }

    public function get_nb_hints ($problem_id) {
        $query = 'select count(*) as nb_hints from hints where problem_id  = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$problem_id]);
        return $response->fetchAll(PDO::FETCH_OBJ)[0]->nb_hints;
    }
}