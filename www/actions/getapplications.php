<?php

require_once("../classes/application.php");
require_once("../classes/util.php");

Database::initialize();

$response = Application::getAll();

Util::writeJson($response);

?>