<?php

class DB_Connexion {
    private static $_dsn = 'pgsql:host=aws-0-eu-central-1.pooler.supabase.com;dbname=postgres';
    private static $_user =  'postgres.smtyqkucrdolnrkzwqjp';
    private static $_pwd = 'ezLz72hM(dJv!@E';

    private static $DB = null;
    private function __construct() {
        try {
            self::$DB = new PDO(self::$_dsn, self::$_user, self::$_pwd);
        } catch (PDOException $exception) {
            die('Connexion to DB failed: '.$exception->getMessage());
        }
    }

    public static function getInstance() {
        if (!isset(self::$DB)) new DB_Connexion();
        return self::$DB;
    }

}