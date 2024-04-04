<?php

class Badges_Status_Table extends DB_Table {
    public function __construct() {
        parent::__construct('badges_status');
    }

    public function get_badges_status($user_id) {
        $query = 'select * from badges_status where user_id = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$user_id]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    public function update_badge_status($badge_id, $user_id, $progress, $acquired) {
        $query = 'update badges_status set progress = ?, acquired = ? where badge_id = ? and user_id = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$progress, (int)$acquired, $badge_id, $user_id]);
    }
}