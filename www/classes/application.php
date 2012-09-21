<?php

class Application
{
    public $id;
    public $name;
    public $version;

    public static function create($app_name, $app_version)
    {
        // :TODO: SQL
    }
    
    public static function get($app_name, $app_version)
    {
        // :TODO: SQL Get if exists or return null
    }
}

?>