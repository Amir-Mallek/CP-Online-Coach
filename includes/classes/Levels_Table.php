<?php

class Levels_Table extends DB_Table {
    public function __construct() {
        parent::__construct('levels');
    }

    public function get_level($level_id) {
        $query = 'select * from level where level_id  = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$level_id]);
        return $response->fetchAll(PDO::FETCH_OBJ)[0];
    }
}