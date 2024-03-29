<?php

class Status_Table extends DB_Table {
    public function __construct() {
        parent::__construct('status');
    }

    public function get_problems_status($level_id, $user_id) {
        $query = '
            select * from status s 
            inner join problems p on p.id  = s.problem_id 
            where p.level_id  = ? and s.user_id = ?';

        $response = $this->db_connexion->prepare($query);
        $response->execute([$level_id, $user_id]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
}