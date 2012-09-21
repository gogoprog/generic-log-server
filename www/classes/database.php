<?php

require_once('../config/config.php');

class Database
{
    private static $mysqli = null;
    
    public static function initialize()
    {
        self::$mysqli = new mysqli(
            DATABASE_HOST,
            DATABASE_USER,
            DATABASE_PASSWORD,
            DATABASE_NAME
            );

        if(self::$mysqli->connect_errno)
        {
            echo "Cannot connect to MySQL : (" . self::$mysqli->connect_errno . ") " . self::$mysqli->connect_error . "<br/>";
            return false;
        }
        
        return true;
    }
    
    public static function query($query)
    {
        return self::$mysqli->query($query);
    }

}

?>