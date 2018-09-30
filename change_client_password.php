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

<!doctype html>
<html lang="en">
<head>

    <title>Admin Dashboard</title>

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
                        <a class="nav-link active" href="change_client_password.php">
                            <span data-feather="edit"></span>
                        Change password</a>
                    </li>



                </ul>
            </div>
        </nav>
    </div>
    <div>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<?php
if(isset($_POST["userid"]) && !empty($_POST["userid"])) {
    $userid = trim($_POST["userid"]);
    $oldpass = trim($_POST['oldpass']);
    $newpass = trim($_POST['newpass']);
    $newpass1 = trim($_POST['newpass1']);
	$password = password_hash($newpass, PASSWORD_DEFAULT);
// Validate name

	//validate old password 
	$userid = trim($_POST["userid"]);
  $sql ="SELECT * FROM shiny_users where `id`=$userid";
  $query = mysqli_query($link,$sql);
  $row=mysqli_num_rows($query);
  $check = mysqli_fetch_assoc($query);
  
  $hash = $check['password'];
  if(password_verify($oldpass, $hash)){
// Check input errors before inserting in database
// Prepare an update statement
	if($newpass == $newpass1){
		
		$sql = "UPDATE shiny_users SET password=? WHERE id=?";

		if ($stmt = mysqli_prepare($link, $sql)) {
			// Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "ss", $param_pass, $param_id);

			// Set parameters
			$param_pass = $password;
		$param_id = $userid; 

			// Attempt to execute the prepared statement
			if (mysqli_stmt_execute($stmt)) { ?>
			<div class="alert alert-success alert-dismissible alert-pass-change">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Password Changed Successfully</strong> 
			</div>
			<?php }

			// Close statement
			mysqli_stmt_close($stmt);
		}
	}
} else{ ?>
	<div class="alert alert-danger alert-dismissible alert-pass-change">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Old Password did not match</strong> 
	</div>
<?php }

}
?>
            <div class="page-header clearfix" style="margin-top: 30px">
                <h2 class="pull-left">Change Password</h2>
            </div>
            <?php
			$sql ="SELECT * FROM shiny_users where `id`=$id";
            $result = mysqli_query($link,$sql);
            echo '<br>';
            while ($row = mysqli_fetch_array($result)) {
                $username=$row['username'];
                $email=$row['email'];
                $fname=$row['fname'];
                $lname=$row['lname'];
                echo 'User Name:   '.'<b>'.$username.'</b>'; echo "</br>";
            }
            mysqli_free_result($result);
            mysqli_close($link);
            ?>

            <form action="<?php echo htmlspecialchars(basename($_SERVER['PHP_SELF'])); ?>" method="post">
                <div class="form-group">
                    <label>Username*</label>
                    <input type="text" disabled name="username" class="form-control" value="<?php echo $username; ?>" required>
                </div>
                <div class="form-group ">
                    <label>Old Password</label>
                   <input type="password" name="oldpass" class="form-control" value="" required>
                </div>
                 <div class="form-group ">
                    <label>New Password</label>
                   <input type="password" name="newpass" class="form-control" value="" required>
                </div>
				 <div class="form-group ">
                    <label>Confirm New Password</label>
                   <input type="password" name="newpass1" class="form-control" value="" required>
                </div>
                <input type="hidden" name="userid" value="<?php echo $id; ?>"/>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>


        </main>
            </div>
        <!--</div>-->

        <!-- Bootstrap core JavaScript
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
	
</body>
</html>
