<?php

class Badges_Status_Table extends DB_Table
{
    public function __construct()
    {
        parent::__construct('badges_status');
    }

    /**
     * @param $user_id
     * @return array|false [badge_id, title, description, image_name, progress,acquired]
     */
    public function get_full_badges_status($user_id){
        $query = 'select * from getBadgesSection (?)';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$user_id]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
}