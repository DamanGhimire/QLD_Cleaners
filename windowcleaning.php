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
    <title>Window Cleaning</title>
</head>
<body>
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
</body>
</html>

<?php include_once("footer.php"); ?>
</body>
</html>