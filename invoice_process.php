<?php
include("functions/db.php");
	$quoteid = $_POST['quoteid'];
	if(!empty($_POST['userid'])){
		$userid = $_POST['userid'];
	} else{
		$userid = "NULL";
	}
	$usertype = $_POST['usertype'];
	$total = $_POST['total'];
	$date = date('Y-m-d H:i:s');
	
	$sql ="INSERT INTO invoice (`quote_id`,`user_id`,`user_type`,`total`,`created`) VALUES ($quoteid,$userid,'$usertype','$total','$date')";
	$result = mysqli_query($link,$sql);
	echo $sql;
	
	if($result==1){
		session_start();
		$_SESSION['msgs'] = "Invoice Created Successfully";
	}
	
	
	header('location:create_invoice.php?id='.$quoteid);
 
 ?>