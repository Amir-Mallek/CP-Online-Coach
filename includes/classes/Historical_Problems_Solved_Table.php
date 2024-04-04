<?php

class Historical_Problems_Solved_Table extends DB_Table
{
    public function __construct()
    {
        parent::__construct('historical_problems_solved');
    }

    /**
     * @param $user_id
     * @return array|false [year,month,nb_problems_solved]
     */
    public function get_status($user_id){
        $query = 'SELECT * FROM historical_problems_solved WHERE user_id=? ORDER BY year ASC, month ASC;';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$user_id]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }}