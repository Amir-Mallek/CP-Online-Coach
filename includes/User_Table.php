<?php

class User_Table extends DB_Table
{
    private $user_id;
    public function __construct(int $user_id)
    {
        parent::__construct('postgres.public.user');
        $this->user_id=$user_id;
    }

    /**
     * @return false|object|stdClass|null [username,email,password,linkedin_acc ,github_acc ,leetcode_acc ,codeforces_ac,image_name]
     */
    public function get_user(){
        $query = 'select * from postgres.public.user where id  = ?';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$this->user_id]);
        return $response->fetchObject();
    }

    /**
     * @return array|false [language,count]
     */
    public function get_languages(){
        $query = 'select * from getLanguagesSection (?)';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$this->user_id]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @return array|false [topic,count,overall]
     */
    public function get_skills(){
        $query = 'select * from getSkillsSection (?)';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$this->user_id]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @return array|false [difficulty,count,overall]
     */
    public function get_difficulties(){
        $query = 'select * from getDifficultySection (?)';
        $response = $this->db_connexion->prepare($query);
        $response->execute([$this->user_id]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
}