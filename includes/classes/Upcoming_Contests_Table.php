<?php

class Upcoming_Contests_Table extends DB_Table
{
    public function __construct()
    {
        parent::__construct('upcoming_contests');
    }

    /**
     * @return array|false [title,image_name,contest_link,place_or_platform,contest_date]
     */
    public function get_upcoming_contests(){
        $query = 'select * from upcoming_contests';
        $response = $this->db_connexion->prepare($query);
        $response->execute();
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
}