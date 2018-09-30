<?php
 include("functions/db.php");
$id = $_GET['id'];
$sql ="DELETE FROM shiny_users where `id`=$id";
  $result = mysqli_query($link,$sql);
  $row=mysqli_num_rows($result);
  
 // echo $sql;
  header('location:manage_users.php');
 ?>