<?php
 include("functions/db.php");
$id = $_GET['id'];
//echo "<pre>"; print_r($_POST); echo "</pre>";
$date = $_POST['start_date'];
$assign_date = $date;
	//echo $assign_date
	if(!empty($_POST['assign'])){
		$userid = implode(',',$_POST['assign']);
	}
	$sql1 ="SELECT * FROM quote_cleaner where `quote_id`=$id and `assign_date`='$assign_date'";
	$query1 = mysqli_query($link,$sql1);
	$row1 = mysqli_num_rows($query1);
	$getid = mysqli_fetch_assoc($query1);
	$insertid = $getid['id'];
	if($row1>0){
		$sql ="UPDATE quote_cleaner SET `user_id`='$userid' WHERE `id`=$insertid";
		$result = mysqli_query($link,$sql);
		$sql ="UPDATE quote SET `status`='assigned' WHERE `id`=$id";
		$result = mysqli_query($link,$sql);
	} else{
		$sql ="INSERT INTO quote_cleaner (`quote_id`,`user_id`,`assign_date`,`start_date`) VALUES ($id,'$userid','$assign_date','$date')";
		$result = mysqli_query($link,$sql);
		$sql ="UPDATE quote SET `status`='assigned' WHERE `id`=$id";
		$result = mysqli_query($link,$sql);
	}
	
	 echo $sql."<br/>";
	 
	 if($result==1){
		session_start();
		$_SESSION['msgs'] = "Task Assigned Successfully";
	}
/* $sql ="UPDATE quote SET `status`='completed' where `id`=$id";
  $result = mysqli_query($link,$sql);
  $row=mysqli_num_rows($result); */
  
 // echo $sql;
 header('location:assign_job.php?id='.$id);
 ?>