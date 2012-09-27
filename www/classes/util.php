<?php

class Util
{
    public static function decodeJson()
    {
        if(isset($_REQUEST["json"]))
        {
            $json = $_REQUEST["json"];
            $json = json_decode($json, true);
            return $json;
        }
        else
        {
            return null;
        }
    }
    
    public static function writeJson($array)
    {
        print(json_encode($array, JSON_NUMERIC_CHECK));
    }
}

?>