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
        $query = "INSERT INTO log(session_id, content, level) VALUES(" . $session_id . ", " . $level . ", '" . $content . "')";
        Database::query($query);
    }

}

?>