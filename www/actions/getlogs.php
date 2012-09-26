<?php

require_once("../classes/log.php");
require_once("../classes/util.php");

Database::initialize();

$json = Util::decodeJson();

$sessionId = $json["session_id"];

$response = Log::getAllFromSessionId($sessionId);

Util::writeJson($response);

?>