<?php
 require_once 'functions/db.php';
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("location: login.php");
    exit;
}else{
    $id=$_SESSION['id'];

}
?>


<?php
if(isset($_POST["userid"]) && !empty($_POST["userid"])) {
    $userid = trim($_POST["userid"]);
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
	$address = trim($_POST['address']);
	$contact = trim($_POST['contact']);
	$availability =  implode(",", $_POST['availability']);
    echo $fname;
    echo $lname;
    echo $email;
	echo $availability;
// Validate name

// Check input errors before inserting in database
// Prepare an update statement
    $sql = "UPDATE shiny_users SET email=?, fname=?, lname=?, address=?, contact=?, availability=? WHERE id=?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssssi", $param_email, $param_fname, $param_lname, $param_address, $param_contact, $param_availability, $param_id);

        // Set parameters
        $param_fname = $fname;
        $param_lname = $lname;
        $param_email = $email;
        $param_id = $userid;
		$param_address = $address;
		$param_contact = $contact;
		$param_availability = $availability;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records updated successfully. Redirect to landing page
            header("location: editcleanerprofile.php");
            exit();
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

// Close connection
    mysqli_close($link);
}
?>

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
    <span style="color:white; margin:0px;"> <b>QLD Cleaners | Welcome to our Cleaner Dashboard <?php echo strtoupper($_SESSION['username']); ?></b></span>
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
                        <a class="nav-link" href="cleanerhome.php">
                            <span data-feather="home"></span>
                            My Jobs <span class="sr-only"></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="editcleanerprofile.php">
                            <span data-feather="users"></span>
                            Profile <span class="sr-only"></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="change_cleaner_password.php">
                            <span data-feather="edit"></span>
                            Change Password <span class="sr-only"></span>
                        </a>
                    </li>


                </ul>
            </div>
        </nav>
    </div>
    <div>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="page-header clearfix" style="margin-top: 50px">
                <h2 class="pull-left">Update Profile</h2>
            </div>
            <?php
           
            $result = mysqli_query($link, "SELECT * FROM shiny_users where id=$id");
            echo '<br>';
            while ($row = mysqli_fetch_array($result)) {
                $username=$row['username'];
                $email=$row['email'];
                $fname=$row['fname'];
                $lname=$row['lname'];
				$address=$row['address'];
				$contact=$row['contact'];
				$availability = explode(",", $row['availability']);
                echo 'User Name:   '.$username; echo "</br>";
            }
            mysqli_free_result($result);
            mysqli_close($link);
            ?>

        <form action="<?php echo htmlspecialchars(basename($_SERVER['PHP_SELF'])); ?>" method="post">
            <div class="col-md-9 noleft cleanerprofile">
				<div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>" required>
                </div>
                <div class="form-group ">
                    <label>Last Name</label>
                    <input type="text" name="lname" class="form-control" value="<?php echo $lname ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" required>
                </div>
				<div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" required>
                </div>
				<div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="contact" class="form-control" value="<?php echo $contact; ?>" required>
                </div>
			</div>
			<div class="col-md-3 noright cleanerprofile">
				<div class="form-group">
                    <label>Availability</label><br/>
                    <label class="checkbox-inline">
						<input type="checkbox" name="availability[]" <?php if(in_array('sunday',$availability)){ echo "checked"; } ?> value="sunday">Sunday
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="availability[]" <?php if(in_array('monday',$availability)){ echo "checked"; } ?> value="monday">Monday
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="availability[]" <?php if(in_array('tuesday',$availability)){ echo "checked"; } ?> value="tuesday">Tuesday
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="availability[]" <?php if(in_array('wednesday',$availability)){ echo "checked"; } ?> value="wednesday">Wednesday
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="availability[]" <?php if(in_array('thursday',$availability)){ echo "checked"; } ?> value="thursday">Thursday
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="availability[]" <?php if(in_array('friday',$availability)){ echo "checked"; } ?> value="friday">Friday
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="availability[]" <?php if(in_array('saturday',$availability)){ echo "checked"; } ?> value="saturday">Saturday
					</label>
                </div>
			</div>
			<div class="clearfix"></div>
                <input type="hidden" name="userid" value="<?php echo $id; ?>"/>
                <input type="submit" class="btn btn-primary" value="Submit">
        </form>


    </main>
            </div>
        <!--</div>-->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../../assets/js/vendor/popper.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>

        <!-- Icons -->
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>

        <!-- Graphs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                    datasets: [{
                        data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        borderWidth: 4,
                        pointBackgroundColor: '#007bff'
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: false
                            }
                        }]
                    },
                    legend: {
                        display: false,
                    }
                }
            });
        </script>
</body>
</html>
