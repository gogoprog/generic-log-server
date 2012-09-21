<?php

require_once('application.php');

class Session
{
    public $id;
    public $appId;

    public static function create($app_name, $app_version)
    {
        $app = Application::get($app_name, $app_version);
        
        if($app == null)
        {
            $app = Application::create($app_name, $app_version);
        }
    }

}

?>