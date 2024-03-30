<?php

class Open_Hints_Table extends DB_Table {
    public function __construct() {
        parent::__construct('open_hints');
    }

    public function get_open_hints ($problem_id, $user_id) {
        $query = '
            select oh.* from open_hints oh 
            inner join hints h on h.id = oh.hint_id 
            where h.problem_id = ?  and oh.user_id = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$problem_id, $user_id]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    function open_hint($hint_id, $user_id) {
        $query = 'insert into open_hints (user_id, hint_id) values (?, ?)';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$user_id, $hint_id]);
    }
}