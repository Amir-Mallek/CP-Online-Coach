<?php
class DBConnection
{
    private static $_dbname = "postgres";
    private static $_user = "postgres.smtyqkucrdolnrkzwqjp";
    private static $_pwd = "ezLz72hM(dJv!@E";
    private static $_host = "aws-0-eu-central-1.pooler.supabase.com";
    private static $_bdd = null;
    private function __construct()
    {

        try {
            self::$_bdd = new PDO("pgsql:host=" . self::$_host . ";dbname=" . self::$_dbname . ";", self::$_user, self::$_pwd,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        } catch (PDOException $e) {
            die('Error : ' . $e->getMessage());
        }
    }
    public static function getInstance()
    {
        if (!self::$_bdd) {
            new DBConnection();
        }
        return (self::$_bdd);
    }
}
?>