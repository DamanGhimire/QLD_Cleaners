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
                    <a class="navbar-brand" href="Index.php"><img src="img/logo007.png" style="margin: 0px"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto" >
                            <li class="nav-item">
                                <a class="nav-link" href="display_reg.php" style="color: white">Home</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="log_out.php" style="color:white" >Logout</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color: white;background-color: #1c7430">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
            <div>
              <h3>Welcome Administrator</h3>
            </div>
            