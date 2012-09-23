<?php

require_once("../classes/application.php");
require_once("../classes/session.php");
require_once("../classes/util.php");

Database::initialize();

$json = Util::decodeJson();

$appName = $json["name"];
$version = $json["version"];
$user = $json["user"];

$session = Session::create($appName, $version, $user);

$response = array();
$response["session_id"] = $session->id;

Util::writeJson($response);

?>