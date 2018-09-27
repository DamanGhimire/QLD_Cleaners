<?php 
session_start();
if (!isset($_SESSION['user'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link href="" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>

<!-- Navigation -->
<div>
    <div class="row" >
        <div class="col-md-12">
            <div class="header">
                <nav class="navbar navbar-expand-lg navbar-light" style="color:white" >
                    <a class="navbar-brand" href="#"><img src="img/new-logo.png" style="margin: 0px"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto" >
                            <li class="nav-item">
                                <a class="nav-link" href="log_out.php" style="color:white" >Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div>
              <h3>Welcome Administrator</h3>
            </div>