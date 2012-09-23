<?php

require_once("database.php");

class Application
{
    public $id;
    public $name;
    public $version;

    public static function create($name, $version)
    {
        $application = new Application();
        
        $query = "INSERT INTO application(name,version) VALUES('" . $name . ", '" . $version . "')";
        Database::query($query);
        
        $application->id = Database::getLastInsertedId();
        
        return $application;
    }
    
    public static function get($app_name, $app_version)
    {
        // :TODO: SQL Get if exists or return null
    }
}

?>