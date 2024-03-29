<?php

class DB_Table {
    protected $db_connexion;
    private $table_name;

    public function __construct(string $table_name) {
        $this->table_name = $table_name;
        $this->db_connexion = DB_Connexion::getInstance();
    }

    public function insert($data) {
        $nb_cols = count($data);
        $values = '?';
        for ($i = 1; $i < $nb_cols; $i++) {
            $values = $values.', ?';
        }
        $query = "insert into $this->table_name values ($values)";
        $response = $this->db_connexion->prepare($query);
        $response->execute($data);
    }
}