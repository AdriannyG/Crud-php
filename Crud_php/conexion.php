<?php
class Database
{
    private static $dbName = 'crud_php'; 
    private static $dbhost = 'localhost';
    private static $dbusername = 'root';
    private static $dbpassword = '';
    private static $cont = null;

    public function __construct() {
        die ('la funcion de inicio no esta permitida');
    }
    public static function connect()
    {
        if (null == self::$cont)
        {
            try
            {
                self::$cont = new PDO ("mysql:host=".self::$dbhost.";"."dbname=" .self::$dbName, self::$dbusername, self::$dbpassword);
            }
            catch(PDOException $e)
            {
                die ($e->getMessage());
            }
        }
        return self::$cont;
    }
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>