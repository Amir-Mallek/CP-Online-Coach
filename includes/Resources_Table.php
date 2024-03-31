<?php

class Resources_Table extends DB_Table {
    public function __construct() {
        parent::__construct('resources');
    }

    public function get_resources($level_id) {
        $query = 'select * from resources where level_id  = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$level_id]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
}