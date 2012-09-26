<?php

require_once('application.php');

class Session
{
    public $id;
    public $appId;

    public static function create($app_name, $app_version, $user)
    {
        $session = new Session();

        $app = Application::get($app_name, $app_version);

        if($app == null)
        {
            $app = Application::create($app_name, $app_version);
        }

        $query = "INSERT INTO session(app_id, start_date, user) VALUES(" . $app->id . ", NOW(), '" . $user . "')";
        Database::query($query);

        $session->id = Database::getLastInsertedId();
        $session->appId = $app->id;

        return $session;
    }

    public static function getAllFromApplicationId($app_id)
    {
        $array = array();
        
        $query = "SELECT * FROM session WHERE app_id = " . $app_id . " ORDER BY id";
        $result = Database::query($query);
        
        $array = $result->fetch_all(MYSQLI_ASSOC);
        
        return $array;
    }

}

?>