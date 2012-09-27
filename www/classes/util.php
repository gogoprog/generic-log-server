<?php

class Util
{
    public static function decodeJson()
    {
        if(isset($_REQUEST["json"]))
        {
            $json = $_REQUEST["json"];
            $json = json_decode($json, true)[0];
            return $json;
        }
        else
        {
            return null;
        }
    }
    
    public static function writeJson($array)
    {
        print(json_encode($array));
    }
}

?>