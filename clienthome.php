<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("location: login.php");
    exit;
}
$userid = $_SESSION['id'];
?>


<?php
//include("functions/db.php");
//$sql ="SELECT * FROM shiny_works";
//$result = mysqli_query($link,$sql);
//$row=mysqli_num_rows($result);
//
//include_once("header.php");
//?>

<!doctype html>
<html lang="en">
<head>

    <title>Client Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-light fixed-top bg-dark flex-md-nowrap p-0 shadow navblue">
    <span style="color:white; margin:0px;"> <b>QLD Cleaners | Welcome to our Client Dashboard <?php echo strtoupper($_SESSION['username']); ?></b></span>
    <ul class="navbar-nav px-3">


        <li class="nav-item text-nowrap">
		<a class="nav-link" href="log_out.php" style="color:white">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="clienthome.php">
                            <span data-feather="home"></span>
                            Jobs requested <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="client_quote.php">
                            <span data-feather="users"></span>
                        Request Quote</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="edit_client_profile.php">
                            <span data-feather="users"></span>
                        Profile</a>
                    </li>
					
					<li class="nav-item">
                        <a class="nav-link" href="clientinvoice.php">
                            <span data-feather="users"></span>
                        My Invoice</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="change_client_password.php">
                            <span data-feather="edit"></span>
                        Change password</a>
                    </li>



                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="page-header clearfix" style="margin-top: 50px">
                    <h2 class="pull-left">Request Details</h2>
                </div>
                <?php
                require_once 'functions/db.php';
                $result = mysqli_query($link, "SELECT * FROM quote where `user_id`=$userid");

                echo '<br>';
                echo "<table border='1' width='100%'>  
<tr>
<th>Property</th>
<th>Bedroom</th>
<th>Bathroom</th>
<th>Registration date</th>
<th>Preferred Cleaning date</th>
<th>Address</th>
<th>Message</th>
<th>Status</th>
</tr>";

                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['property_type'] . "</td>";
                    echo "<td>" . $row['no_of_bedroom'] . "</td>";
                    echo "<td>" . $row['no_of_bathroom'] . "</td>";
                    echo "<td>" . $row['reg_date'] . "</td>";
                    echo "<td>" . $row['pref_clean_start_date'] . "</td>";
                    echo "<td>" . $row['unit_number'] ."/".$row['house_number'] .','.$row['street'] .','.$row['suburb'] . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
//        echo "<a href='readcategory.php?id=".$row['cat_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
//        echo "<a href='editcategory.php?id=".$row['cat_id'] ."&action=update' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
//        echo "<a href='deletecategory.php?id=".$row['cat_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
                mysqli_close($link);
                ?>

        </main>
        <!--    </div>-->
        <!--</div>-->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-slim.min.js"><\/script>')</script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Icons -->
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>
</body>
</html>
