<?php
@session_start();
require_once('./app/config.php');
require_once('./app/database.php');
require_once('./app/app.php');

$controller = isset($_GET['c']) ? strtolower($_GET['c']) : DEFAULT_CONTROLLER;
$action = isset($_GET['a']) && $_GET['a'] != '' ? $_GET['a'] : DEFAULT_ACTION;

define('CONTROLLER', $controller);

if (file_exists("controller/" . $controller . ".php")) {
	$controller = ucwords($controller);
	require_once "./controller/" . $controller . ".php";
	$controller = new $controller;
	if (method_exists($controller, strtolower($action))) {
		call_user_func(array($controller, $action));
	} else {
		echo MSG_ERROR_404;
	}
} else {
	echo MSG_ERROR_404;
}
?>