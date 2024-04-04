<?php

class Badge_Table extends DB_Table {
    public function __construct() {
        parent::__construct('badges');
    }

    public function get_badges() {
        $query = 'select * from badges';
        $response = $this->db_connexion->prepare($query);
        $response->execute();
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
}