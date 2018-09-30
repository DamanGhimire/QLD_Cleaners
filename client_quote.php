<?php
// Initialize the session
require_once 'functions/db.php';
session_start();

// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("location: login.php");
    exit;
}
$userid = $_SESSION['id'];
if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $userid = $_SESSION['id'];
		$user_type = "registered";
    } else{
		$userid = "";
		$user_type = "guest";
	}
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
                        <a class="nav-link" href="clienthome.php">
                            <span data-feather="home"></span>
                            Jobs requested <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="client_quote.php">
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
<?php 
$userid = $username = $fname = $lname = $phone = $email = $propertytype = $bedroom = $bathroom = $unit = $house = $street = $suburb = $postcode = $startdate = $message = "";
$username_err = $password_err = $user_type_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //error_reporting(0);
    // Validate username
	//print_r($_POST); die();
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $propertytype = trim($_POST['propertytype']);
    $bedroom = trim($_POST['bedroom']);
    $bathroom = trim($_POST['bathroom']);
    $unit = trim($_POST['unitnumber']);
    $house = trim($_POST['housenumber']);
    $street = trim($_POST['street']);
    $suburb = trim($_POST['suburb']);
    $postcode = trim($_POST['postcode']);
    $startdate = trim($_POST['cleanstartdate']);
    $message = trim($_POST['message']);

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $userid = $_SESSION['id'];
		$user_type = "registered";
    } else{
		$userid = "";
		$user_type = "guest";
	}
	$status = "requested";
	$date = date('Y-m-d H:i:s');
	/* $sql ="INSERT INTO quote (`property_type`,`no_of_bedroom`,`no_of_bathroom`,`pref_clean_start_date`,`email`,`contact`,`fname`,`lname`,`unit_number`,`house_number`,`street`,`suburb`,`POST_CODE`,`message`,`user_id`,`user_type`,`status`,`reg_date`)
	VALUES ('$propertytype','$bedroom','$bathroom','$startdate','$enddate','$email','$phone','$fname','$lname','$unit','$house','$street','$suburb','$postcode','$message','$userid','$user_type','$status','$date')";
	$result = mysqli_query($link,$sql);
	$err = $link;
	echo mysqli_error($err);
	echo $sql;
	echo $result;
	if($result==1){
		echo "success";
	} else{
		echo "error";
	} */

//         Prepare an insert statement
    $sql = "INSERT INTO quote (property_type, no_of_bedroom, no_of_bathroom, pref_clean_start_date, email, contact, fname, lname, unit_number, house_number, street, suburb, POST_CODE, message, user_id, user_type, status, reg_date) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    //print $sql;

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssssssssssssssss", $param_prop, $param_bedroom, $param_bathroom,
            $param_startdate, $param_email, $param_contact, $param_fname, $param_lname, $param_unit
            , $param_house, $param_street, $param_suburb, $param_post, $param_message, $param_userid, $param_usertype, $param_status, $param_regdate);


        // Set parameters
        $param_prop = $propertytype;
        $param_bedroom = $bedroom;
        $param_bathroom = $bathroom;
        $param_startdate = $startdate;
        $param_email = $email;
		$param_contact = $phone;
        $param_fname = $fname;
        $param_lname = $lname;
        $param_unit = $unit;
        $param_house = $house;
        $param_street = $street;
        $param_suburb = $suburb;
        $param_post = $postcode;
        $param_message = $message;
        $param_userid = $userid;
		$param_usertype = $user_type;
		$param_status = $status;
		$param_regdate = $date;

        //print $sql; 
       // print $param_contact;//die();
        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            ?>
			<div class="alert alert-success alert-dismissible alert-pass-change">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Quote Requested Successfully</strong> 
			</div>
			<?php
           
        } else {
            echo "Something went wrong. Please try again later.";
        }
		 mysqli_stmt_close($stmt);
    }
    // Close statement
   
    mysqli_close($link);
}

// Close connection
?>
                <div class="page-header clearfix">
                    <h2 class="pull-left">Request Quote</h2>
                </div>
            <form id="registration" enctype="multipart/form-data"
                              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                            <div>Personal Information</div>
                            <div class="form-group">
                                <label for="name">First Name </label>
                                <input type="text" class="form-control" name="fname" id="fname" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Last Name </label>
                                <input type="text" class="form-control" name="lname" id="lname" required>
                            </div>

                            <div class="form-group">
                                <label for="phone_no">Phone no.:</label>
                                <input type="text" name="phone" id="phone" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input name="email" type="email" class="form-control" id="email"
                                       placeholder="Enter email" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.
                                </small>
                            </div>

                            <div>Property Information</div>
                            <div class="form-group">
                                <label for="property">Property Type :</label>
                                <select name="propertytype" id="propertytype" class="form-control" required>
                                    <option selected disabled></option>
                                    <option value="Apartment">Apartment</option>
                                    <option value="House">House</option>
                                    <option value="Unit">Unit</option>
                                    <option value="TownHouse">Townhouse</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bedroom">No. of Bedroom :</label>
                                <select name="bedroom" id="bedroom_no" class="form-control" required>
                                    <option selected disabled></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option>6+</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bathroom">No. of Bathroom :</label>
                                <select name="bathroom" id="bathroom_no" class="form-control" required>
                                    <option selected disabled></option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>6+</option>
                                </select>
                            </div>

                            <div>Property Address</div>
                            <div class="form-group">
                                <label for="name">Unit Number </label>
                                <input type="text" class="form-control" name="unitnumber" required>
                            </div>

                            <div class="form-group">
                                <label for="name">House Number</label>
                                <input type="text" class="form-control" name="housenumber" required>
                            </div>

                            <div class="form-group">
                                <label for="street">Street</label>
                                <input type="text" name="street" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="suburb">Suburb</label>
                                <input name="suburb" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="postcode">Post Code</label>
                                <input type="text" class="form-control" name="postcode" required>
                            </div>

                            <div class="form-group">
                                <label for="reg_date">Preferred Cleaning date :</label>
                                <input type="date" name="cleanstartdate" id="cleanstartdate" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="message">Any Message :</label>
                                <textarea name="message" class="form-control" id="message" rows="5" cols="40"
                                          maxlength="800"></textarea>
                            </div>
                            <div>
                                <form action="#"
                                      onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
                                    <input type="checkbox" required name="checkbox" value="check" id="agree"/> I have
                                    read and agree to the <a href="exampleModalLong" data-toggle="modal"
                                                             data-target="#exampleModalLong">Terms and Conditions and
                                        Privacy Policy</a>

                                    <!-- Button trigger modal
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                      Launch demo modal
                                    </button>-->

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Customer Service
                                                        Agreement</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <abbr class="">

                                                        These terms and conditions constitute the full and complete
                                                        service agreement (the "Agreement") between you (the "Customer")
                                                        and QLD Cleaners for the provision of services provided by QLD
                                                        Cleaners.</br>

                                                        Please take some time to review this Agreement. Use of our
                                                        services constitutes your acceptance of these terms and
                                                        conditions.</br>

                                                        <b> cleaning services</b></br>
                                                        Subject to the terms of this Agreement, QLD Cleaners agrees to
                                                        provide domestic cleaning services (the "Service") to the
                                                        Customer at an address specified by the Customer (the
                                                        "Premises").
                                                        The Service will be for such cleaning duties as agreed with the
                                                        Customer at the time of booking.</br>
                                                        QLD Cleaners will provide one or more cleaners (the "Cleaner")
                                                        to attend the Premises to provide the Service at a time and date
                                                        mutually agreed between QLD Cleaners and the Customer (the
                                                        "Service Time").
                                                        QLD Cleaners endeavours to provide the Service faithfully,
                                                        diligently and in a timely and professional manner.</br>

                                                    </abbr>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                        OK
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- modal ends-->


                            </div>
                            <input type="submit" id="submit_personal" class="btn btn-primary" value="Submit">
                        </form>    

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
