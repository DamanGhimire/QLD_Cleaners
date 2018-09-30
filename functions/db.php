<?php
$db_name='qld_cleaners';
$host='localhost';
$user='root';
$password='';

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
$username = "root";
$password = "";
$db="qld_cleaners";
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