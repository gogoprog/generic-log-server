<?php

require_once("../classes/util.php");
require_once("../classes/log.php");

Database::initialize();

$json = Util::decodeJson();

$sessionId = $json["session_id"];
$level = $json["level"];
$content = $json["content"];

Log::add($sessionId, $level, $content);

$response = array();
$response["error"] = "none";

Util::writeJson($response);

?>