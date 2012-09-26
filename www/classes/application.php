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

        $query = "INSERT INTO application(name,version) VALUES('" . $name . "' , '" . $version . "')";
        Database::query($query);

        $application->id = Database::getLastInsertedId();
        
        return $application;
    }
    
    public static function get($app_name, $app_version)
    {
        $query = "SELECT id FROM application WHERE name='" . $app_name . "' AND version='" . $app_version . "'";
        $result = Database::query($query);

        if($result->num_rows)
        {
            $app = new Application();
            $row = $result->fetch_row();

            $app->name = $app_name;
            $app->version = $app_version;

            $app->id = $row[0];

            $result->close();

            return $app;
        }

        return null;
    }
    
    public static function getAll()
    {
        $array = array();
        
        $query = "SELECT * FROM application";
        $result = Database::query($query);
        
        $array = $result->fetch_all(MYSQLI_ASSOC);
        
        return $array;
    }
}

?>