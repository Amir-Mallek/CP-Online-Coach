<?php

class dataBase
{
    private static $_bdd = null;
    public function __construct()
    {
        try {

            $_bdd = new PDO('pgsql:host=aws-0-eu-central-1.pooler.supabase.com;dbname=postgres','postgres.smtyqkucrdolnrkzwqjp','ezLz72hM(dJv!@E');

            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }
    public static function getInstance(){
        if(!self::$_bdd){
            self::$_bdd =  new PDO('pgsql:host=aws-0-eu-central-1.pooler.supabase.com;dbname=postgres','postgres.smtyqkucrdolnrkzwqjp','ezLz72hM(dJv!@E');
        }
        return self::$_bdd;

    }

}