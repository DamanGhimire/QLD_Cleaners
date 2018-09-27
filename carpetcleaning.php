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
    <title>Carpet Cleaning</title>
</head>
<body>
<div class="col-10">
    <div class="col-12" style="width:100%;float: none; margin-left: 12%;">
        <h1>Carpet Cleaning</h1>
        <img class="img-fluid" src="img/carpet-cleaning1.jpg" alt="Chania">
<p style="text-align:justify">
    Queensland Cleaners, Brisbane carpet cleaning services in Brisbane is your one-stop solution for all your cleaning needs! We started off with a speciality in carpets and rugs, delivering a high standard of clean using advanced cleaning technology. Since then we’ve grown though, and now we take care of virtually any and all soft furnishings around the home.
</p></div>
</div>
</body>
</html>

<?php include_once("footer.php"); ?>
</body>
</html>