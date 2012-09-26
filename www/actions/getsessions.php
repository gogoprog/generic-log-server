<?php

require_once("../classes/session.php");
require_once("../classes/util.php");

Database::initialize();

$json = Util::decodeJson();

$appId = $json["app_id"];

$response = Session::getAllFromApplicationId($appId);

Util::writeJson($response);

?>