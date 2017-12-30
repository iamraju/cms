<?php
$config = include dirname(__FILE__) . "/../config.php";

$db = new mysqli($config['host'], $config['user'], $config['password'], $config['database']);

if($db->connect_error) {
	echo "Database connection error : " . $con->connect_errorno . " : " . $con->connect_error;
	die();
}

include dirname(__FILE__) . "/functions.php";