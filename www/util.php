<?php
    include("config/config.php");

    // DATABASE
    
    $mysqli = new mysqli(
        DATABASE_HOST,
        DATABASE_USER,
        DATABASE_PASSWORD,
        DATABASE_NAME
        );

    if($mysqli->connect_errno)
    {
        echo "Cannot connect to MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "<br/>";
    }

    // JSON PARAMETER

    $json = $_GET["json"];
    $json = json_decode($json, true)[0];

?>
