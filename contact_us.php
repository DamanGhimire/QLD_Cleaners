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
    <title>Contact us</title>
</head>
<body>


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
                <p>Address: <strong>8/9 rowell street,zillmere</strong>
                </p>


            </div>    

        </div>
    </div>
</div>    

</body>
</html>

<?php include_once("footer.php"); ?>
</body>
</html>
