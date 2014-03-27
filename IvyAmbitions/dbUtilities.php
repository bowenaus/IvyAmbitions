<?php
require('config.php');


function getDbConnection()
{
	global $host,$user, $password, $database;
	return new mysqli($host, $user, $password, $database);
}

?>