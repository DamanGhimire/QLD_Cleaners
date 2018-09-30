<?php

error_reporting(0);

include("functions/db.php");
$property=mysql_escape_String($_POST["property"]);
$bedroom=mysql_escape_String($_POST["bedroom"]);    
$bathroom=mysql_escape_String($_POST["bathroom"]);
$reg_date=mysql_escape_String($_POST["reg_date"]);
$name=mysql_escape_String($_POST["name"]);
$phone_no=mysql_escape_String($_POST["phone_no"]);
$email=mysql_escape_String($_POST["email"]);
$address=mysql_escape_String($_POST["address"]);
$best_contact=mysql_escape_String($_POST["best_contact"]);
$message=mysql_escape_String($_POST["message"]);
$status=1;
$sql=mysql_query("INSERT INTO shiny_works (property_type, no_bedroom, no_bathroom, service_date, name, email, phone, best_contact, address, message, status) values ('$property','$bedroom','$bathroom','$reg_date','$name','$email','$phone_no','$best_contact','$address','$message','$status') ");
	if ($sql) 
        {
        	echo '<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> <script>$(function(){alert("Successfully Insert");});</script>';
    	    echo("<script>location.href = '".adminHome.".php';</script>");         
        }
    else
        {
            echo "Registration failed" .mysql_error();
        }

?>
