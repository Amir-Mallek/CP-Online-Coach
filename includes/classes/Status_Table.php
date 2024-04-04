<?php

class Status_Table extends DB_Table {
    public function __construct() {
        parent::__construct('status');
    }

    public function get_problems_status($level_id, $user_id) {
        $query = '
            select * from status s 
            inner join problems p on p.id  = s.problem_id 
            where p.level_id = ? and s.user_id = ?';

        $response = $this->db_connexion->prepare($query);
        $response->execute([$level_id, $user_id]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    private function get_status($problem_id, $user_id) {
        $query = 'select * from status where problem_id = ? and user_id = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$problem_id, $user_id]);
        if ($response->rowCount() == 0) return 3;
        return $response->fetchAll(PDO::FETCH_OBJ)[0]->code;
    }

    private function update_status($problem_id, $user_id, $code) {
        $query = 'update status set code = ? where problem_id = ? and user_id = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$code, $problem_id, $user_id]);
    }
    public function set_status($problem_id, $user_id, $new_status) {
        $data = [
            'problem_id' => $problem_id,
            'user_id' => $user_id,
            'code' => $new_status
        ];
        $old_status = $this->get_status($problem_id, $user_id);
        if ($old_status == 0) return;
        if ($old_status == 3) {
            parent::insert($data);
        } else if ($old_status != $new_status) {
            $this->update_status($problem_id, $user_id, $new_status);
        }
    }
}