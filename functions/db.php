<?php
$db_name='jcubitgr_clean';
$host='localhost';
$user='jcubitgr_clean';
$password='123zxc';

	$connection = @mysql_connect($host, $user,$password);
	if(!$connection)
	{
		die("Connection not successful".mysql_error());
	}
	
	$db_select = mysql_select_db($db_name, $connection);
	if(!$db_select)
	{
		die("Database selection not successful".mysql_error());
	}
	
?>
<!--
<?php

// Create connection

function db_connect()
{
    $servername = "localhost";
$username = "jcubitgr_clean";
$password = "123zxc";
$db="jcubitgr_clean";
	$conn = new mysqli($servername, $username, $password, $db);
	if($conn -> connect_error) {
		die('Connect Error: ' . $conn -> connect_error);
	}
	return $conn;
} 
// Check connection

// echo "Connected successfully";
?>
-->