<?php
include_once('functions/db.php');
if (isset($_SESSION['valid_user'])) {
    header("location: adminHome.php");
//        echo(print_r($_SESSION()));
}
session_start();
//    if (isset($_SESSION['valid_user'])){
//        header("location:adminHome.php");
//    }
$conn=db_connect();?>

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
                                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
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
                                <a class="nav-link" href="contact_us.php">Contact us</a>
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

<div>
    <div class="col-10">
    <div class="col-12" style="width:100%;float: none; margin-left: 12%;">
        <h1>Window Cleaning</h1>
        <img class="img-fluid" src="img/Window-Cleaning5.jpg" alt="Chania">
<p>

            Make a great first impression with sparkling clean windows that stand out. No matter how much other glass cleaning is done, unclean windows are always noticeable.

            They are a large part of many premises and often leave a lasting impression on visitors. Present your business in the best possible light with a clean, streak-free view – regardless its size or how large the job.

            For your home, let the Sydney  sunlight back in your home and make sure you get the best out of your view!
            Window Cleaning Services include domestic and commercial window cleaning, body corporate, construction and high-rise window cleaning. Our staff has the experience to handle all manner of jobs from residential through to large commercial buildings and schools. You can be assured we will complete each job in a safe, professional and friendly manner.

            We are committed to providing exceptional service at a competitive price.
            We are a local business and where possible, you will be serviced by a member from your local community. All our people are security screened and insured.
            We consist of only competent, well-trained, specialist Window Cleaners.
            We guarantee our workmanship and use only products and cleaning methods that are time proven, tested and safe.

    </div>
</div>


<?php include_once("footer.php"); ?>

</body>
</html>