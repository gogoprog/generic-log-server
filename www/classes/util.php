<?php

class Util
{
    public static function decodeJson()
    {
        $json = $_GET["json"];
        $json = json_decode($json, true)[0];
        return $json;
    }
    
    public static function writeJson($array)
    {
        print(json_encode($array));
    }
}

?>