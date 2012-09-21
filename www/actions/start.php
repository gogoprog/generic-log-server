<?php

require_once("../classes/application.php");
require_once("../classes/session.php");
require_once("../classes/util.php");

$array = array();
$array["Hello"] = "world";

Util::writeJson($array);

?>