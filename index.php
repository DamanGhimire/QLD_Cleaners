<?php
   include_once('functions/db.php');
   
   	//checkif user is already login then jump to adminHome page
   if (isset($_SESSION['valid_user'])) {
//        header("location:adminHome.php");
       echo("<script>location.href = '".adminHome.".php';</script>");
	}

    session_start();
    
    $conn=db_connect();
    
    include_once("header.php");?>

<?php
    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Check if username is empty
        if(empty(trim($_POST["user"]))){
            $username_err = 'Please enter username.';
        } else{
            $username = $conn -> real_escape_string(trim($_POST['user']));
        }

        // Check if password is empty
        if(empty(trim($_POST['pass']))){
            $password_err = 'Please enter your password.';
        } else{
            $password = $conn -> real_escape_string(trim($_POST['pass']));
        }

        //make the database connection
        $conn  = db_connect();
        // username and password sent from form
        if(empty($username_err) && empty($password_err)){
            //make a query to check if user login successfully
            $sql = "select * from tbl_user where username='$username' and password='$password'";
            $result = $conn -> query($sql);
            $numOfRows = $result -> num_rows;
            $row = $result -> fetch_assoc();
            if ($numOfRows == 1) {
                $_SESSION['valid_user'] = $username;
                $_SESSION['type']=$row['type'];
//                header("location:adminHome.php");
                echo("<script>location.href = '".adminHome.".php';</script>");
                exit;
            }else {
                $error = 'Your Login Name or Password is invalid';
            }
        }
        mysqli_close($conn);
    }
?>
<!--- Image Slider -->
<div class="col-9" style="width:100%;float: none; margin-left: 12%">
<div id="slides" class="carousel slide slide-group" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
		<li data-target="#slides" data-slide-to="1"></li>
		<li data-target="#slides" data-slide-to="2"></li>
	</ul>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="img/background11.jpg">
		</div>
		<div class="carousel-item">
			<img src="img/background22.jpg">
		</div>

		<div class="carousel-item">
			<img src="img/background33.jpg">
		</div>
	</div>
</div>
</div>
<!--- Our Services --->
<div class="container-fluid padding">
<div class="row welcome text-center">
    <div class="col-12">
        <h1 class="display-4">Our Services</h1>
    </div>
</div>
</div>

<!--- Cards --->
<div class="container-fluid padding">
<div class="row padding">
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="img/endoflease.jpg" height=200px >
            <div class="card-body">
                <h4 class="card-title">End of Lease Cleaning</h4>
                <p class="card-text">Queensland Cleaners, Brisbane can help to reduce the stress of all the necessary cleaning chores required at the end of your lease. Whether it’s cleaning ovens, dusting, mopping or vacuuming, Simple Queensland Cleaners will help .....</p>
                <a href="endofleasecleaning.php" class="btn btn-outline-secondary">Read More</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="img/carpet.jpg" height=200px >
            <div class="card-body">
                <h4 class="card-title">Carpet Cleaning</h4>
                <p class="card-text">Queensland Cleaners, Brisbane carpet cleaning services in Brisbane is your one-stop solution for all your cleaning needs! We started off with a speciality in carpets and rugs, delivering a high standard of clean using ..... </p>
                <a href="carpetcleaning.php" class="btn btn-outline-secondary">Read More</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="img/window.jpg" height=200px >
            <div class="card-body">
                <h4 class="card-title">Window Cleaning</h4>
                <p class="card-text">Window Cleaning Services include domestic and commercial window cleaning, body corporate, construction and high-rise window cleaning. Our staff has the experience to handle all manner of jobs from residential through to .....</p>
                <a href="windowcleaning.php" class="btn btn-outline-secondary">Read More</a>
            </div>
        </div>
    </div>

</div>
</div>


<!--- Footer -->
<?php include_once("footer.php"); ?>
</body>
</html>














