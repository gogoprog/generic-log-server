<?php

require_once("database.php");

class Log
{
    public $id;
    public $sessionId;
    public $level;
    public $content;

    public static function add($session_id, $level, $content)
    {
        $query = "INSERT INTO log(session_id, level, content ) VALUES(" . $session_id . ", " . $level . ", '" . $content . "')";
        Database::query($query);
    }

    public static function getAllFromSessionId($session_id)
    {
        $array = array();
        
        $query = "SELECT level, content FROM log WHERE session_id = " . $session_id . " ORDER BY id";
        $result = Database::query($query);
        
        $array = $result->fetch_all(MYSQLI_ASSOC);
        
        return $array;
    }
}

?>