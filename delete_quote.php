<?php
 include("functions/db.php");
$id = $_GET['id'];
$sql ="DELETE FROM quote where `id`=$id";
  $result = mysqli_query($link,$sql);
  $row=mysqli_num_rows($result);
  
 // echo $sql;
  header('location:manage_job_request.php');
 ?>