<?php
define('_SERVER_NAME', 'localhost');
define('_SERVER_URL', 'http://' . _SERVER_NAME);
define('_APP_ROOT', '/php_02_kalkulatorBMI');
define('_APP_URL', _SERVER_URL._APP_ROOT);
define("_ROOT_PATH", dirname(__FILE__)); //sciezka do pliku

function out(&$param){
	if (isset($param)){
		echo $param;
	}
}
?>