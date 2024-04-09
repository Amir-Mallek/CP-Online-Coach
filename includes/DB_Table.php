<?php
require_once ("DB_Connexion.php");
class DB_Table {
    protected $db_connexion;
    private $table_name;

    public function __construct(string $table_name) {
        $this->table_name = $table_name;
        $this->db_connexion = DB_Connexion::getInstance();
    }


    public function insert(array $data) {
        $keys = array_keys($data);
        $keys_string = implode(', ', $keys);
        $params = array_fill(0, count($keys),'?');
        $params_string = implode(', ', $params);

        $request = "INSERT INTO $this->table_name ($keys_string) VALUES ($params_string)";
        $response = $this->db_connexion->prepare($request);

        $response->execute(array_values($data));
    }
}