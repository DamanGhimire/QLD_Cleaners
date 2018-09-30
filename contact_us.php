<?php
   require_once'functions/db.php';
   
    //checkif user is already login then jump to adminHome page
   if (isset($_SESSION['username'])) {
//        header("location:adminHome.php");
       echo("<script>location.href = '".adminHome.".php';</script>");
    }

    session_start();
    
//    $conn=db_connect();?>


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
                    <a class="navbar-brand" href="Index.php"><img src="img/new-logo.png" style="margin: 0px"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto" >
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Services
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#1a75ff">
                                    <a class="dropdown-item" href="endofleasecleaning.php">End of Lease Cleaning</a>
                                    <a class="dropdown-item" href="carpetcleaning.php">Carpet Cleaning</a>
                                    <a class="dropdown-item" href="windowcleaning.php">Window Cleaning</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="contact_us.php">Contact us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="request_quote.php">Request Quote</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

<div class="container">
    <div class="box">
        <div class="row">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Contact Us</h2>
                <hr>
            </div>

            <div class="col-md-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3543.516938610224!2d153.04011431505444!3d-27.359566782937293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b93e294da4fb3c9%3A0x75d41f9847376af3!2s8%2F9+Rowell+St%2C+Zillmere+QLD+4034!5e0!3m2!1sen!2sau!4v1527680520176" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            
            <div class="col-md-4">
                <p>Phone: <strong>0430056485</strong>
                </p>
                <p>Email: <strong><a href="mailto:info@qldcleaners.com.au">info@qldcleaners.com.au</a></strong>
                </p>
                <p>Address: <strong>8/9 ROWELL STREET,ZILLMERE</strong>
                </p>


            </div>    

        </div>
    </div>
</div>    

<?php include_once("footer.php"); ?>

</body>
</html>
