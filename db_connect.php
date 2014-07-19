<?php
    
    class Database
    {
        
        private static $cont  = null;
        
        public function __construct() {
            die('Init function is not allowed');
        }
        
        public static function mysqlConnect($host,$username,$password)
        {
            // One connection through whole application
            if ( null == self::$cont )
            {
                try
                {
                    self::$cont = new PDO( "mysql:host=".$host, $username, $password);
                }
                catch(PDOException $e)
                {
                    die($e->getMessage());
                }
            }
            return self::$cont;
        }
        
        public static function connect($host,$database,$username,$password)
        {
            // One connection through whole application
            if ( null == self::$cont )
            {
                try
                {
                    self::$cont = new PDO( "mysql:host=".$host,";dbname=".$database, $username, $password);
                }
                catch(PDOException $e)
                {
                    die($e->getMessage());
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