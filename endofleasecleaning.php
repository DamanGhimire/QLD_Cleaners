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
$conn=db_connect();
include_once("header.php"); ?>

<html
<head>
    <title>End of Lease Cleaning</title>
</head>
<body>
<div class="col-10">
    <div class="col-12" style="width:100%;float: none; margin-left: 12%;">
        <h1>End of Lease Cleaning</h1>
        <img class="img-fluid" src="img/End-of-lease-cleaning1.jpg" alt="Chania">
<p>
            End of Lease Service
            Queensland Cleaners, Brisbane can help to reduce the stress of all the necessary cleaning chores required at the end of your lease. Whether it’s cleaning ovens, dusting, mopping or vacuuming, Simple Queensland Cleaners will help to make your rental property spotless at the end of your lease term.
            Affordable service
            We offer our customers a complete FIXED PRICE BOND CLEANING service that comes with a Quality Satisfaction Guarantee. Our Cleaning Service can also include carpet steam cleaning and pest control for an additional fee.

            Let’s face it, life’s busy and you have more important things to do than to spend your time cleaning your rental property.  Even if you do have the time, cleaning a rental property to the standard that’s required on the rental agreement is challenging.  Shiny Cleaning is here to help you.
</p>
    </div>
</div>
</body>
</html>

<?php include_once("footer.php"); ?>
</body>
</html>
