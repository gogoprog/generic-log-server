<?php

require_once("../classes/util.php");
require_once("../classes/log.php");

Database::initialize();

$json = Util::decodeJson();

$sessionId = $json["session_id"];
$level = $json["level"];
$content = $json["content"];

$response = array();

if(Log::add($sessionId, $level, $content))
{
    $response["error"] = 0;
}
else
{
    $response["error"] = 1;
    $response["error_message"] = Database::getLastError();
}

Util::writeJson($response);

?>