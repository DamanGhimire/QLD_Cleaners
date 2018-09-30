<?php
require_once 'functions/db.php';
session_start();

if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $userid = $_SESSION['id'];
		$user_type = "registered";
    } else{
		$userid = "";
		$user_type = "guest";
	}
?>


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
    <link href="css/login.css" rel="stylesheet">
    <script>
        $(document).ready(function () {
            alert($fname);

        });
    </script>
    <link href="style.css" rel="stylesheet">

</head>
<body>

<!-- Navigation -->

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
                                <a class="nav-link" href="contact_us.php">Contact us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="request_quote.php">Request Quote</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php" id="login">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="log_out.php" id="logout" style="display:none">Sign Out</a>
                            </li>
                            <li class="nav-item text-nowrap" id="welcomeuser" style="display: none">
                                <font color="white">Welcome <?php echo $_SESSION['username']; ?></font>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

<div>
    <div class="row">
        <div class="col-md-12">

            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
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
            // Redirect to login page
			
			 // Always set content-type when sending HTML email
           /*  $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            print 'going to send email';
            $to = "tamang88sanjeevtest@gmail.com";
            $subject = "My subject";
            $txt = "Hello world!";
            $headers .= "From: webmaster@example.com" . "\r\n" .
                "CC: somebodyelse@example.com";

            mail($to, $subject, $txt, $headers);
            print 'email sent'; */
			
			if ($userid == 1) {
                header("location:adminDashboard.php");
            } elseif ($userid == 2) {
                 header("location:cleanerhome.php");
            } elseif($userid == 3){
                header("location:clienthome.php");
            } ?>
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
                                                        conditions.</br></br>

                                                        <b> Cleaning Services</b></br>
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
                                                        diligently and in a timely and professional manner.</br></br>

                                                        <b>health and safety risks</b></br>
                                                        In addition to the obligations and warranties set out in clause 3 above, the Customer 
                                                    acknowledges and agrees that: </br>
                                                    a. the Cleaner is entitled to undertake a job safety analysis before the commencement of 
                                                any work to assess the health and safety risk at the Premises;</br>
                                                    b. the Cleaner may, either before or during the provision of the Service not use or cease using any 
                                                    materials or cleaning equipment provided by the Customer if the Cleaner thinks, in their absolute 
                                                discretion, that the use of such materials or cleaning equipment poses a risk to health and safety.</br>
                                                    c. he Cleaner may, either before or during the provision of the Service not provide or cease the 
                                                    provision of the Service where carrying out the Service presents, in the absolute discretion of the Cleaner, 
                                                a risk to health and safety.</br></br>

                                                        <b>No engagement of cleaners</b></br>
                                                        a. The Customer acknowledges tydii invests significant resources in recruiting, selecting and training its Cleaners.
                                                         Unless tydii gives prior written permission, the Customer must not, directly or indirectly, engage, employ or
                                                          contract with any Cleaner to provide domestic services to the Customer or any associate of the customer 
                                                          for any period during which services are provided by tydii or for a period within 12 months after the 
                                                      conclusion of any Service.</br>
                                                      loss, as a result of a breach of this clause by the Customer</br></br>




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
                    </div>
                </div>
            </div>


            <?php
            include_once("footer.php");
            ?>

</body>
</html>