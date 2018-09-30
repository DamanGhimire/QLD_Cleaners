<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
}

$userid = $_SESSION['id'];
?>


<?php
  include("functions/db.php");
  $jobid = $_GET['id'];
  $sql ="SELECT * FROM quote where `id`=$jobid";
  $query = mysqli_query($link,$sql);
  $row=mysqli_num_rows($query);
  $result = mysqli_fetch_assoc($query);
  ?>

<!doctype html>
<html lang="en">
  <head>
   
    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
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
                        <a class="nav-link active" href="cleanerhome.php">
                            <span data-feather="home"></span>
                            My Jobs <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="editcleanerprofile.php">
                            <span data-feather="home"></span>
                            Profile <span class="sr-only"></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="change_cleaner_password.php">
                            <span data-feather="home"></span>
                            Change Password <span class="sr-only"></span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
			<div class="panel panel-default">
			
			<div class="panel-heading">
				<h3 class="panel-title"> #<?php echo $result['id']; ?>	
					<p class="pull-right">
						<span class="label label-success "><?php echo strtoupper($result['status']);?></span>
					</p>
				</h3>  
			</div>
			<div class="panel-body">
				<div class="form-group col-md-4" style="text-transform: uppercase">
					Property Type : <b> <?php echo $result['property_type'];?> </b>
				</div>	
				<div class="form-group col-md-4">
					No. of Bedroom : <b> <?php echo $result['no_of_bedroom'];?> </b>
				</div>	
				<div class="form-group col-md-4">
					No. of Bathroom : <b> <?php echo $result['no_of_bathroom'];?> </b>
				</div>	
				<div class="clearfix"></div>
				<div class="form-group col-md-12">
					<hr style="margin:0px;">
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-6">
					Preferred cleaning date : <b><?php echo date('M j Y', strtotime($result['pref_clean_start_date'])); ?> </b>
				</div>
							
				<div class="clearfix"></div>
				<div class="form-group col-md-12">
					<hr style="margin:0px;">
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-4">
					<label>First Name </label>
					<p><?php echo $result['fname'];?></p>
				</div>
				
				<div class="form-group col-md-4">
					<label>Last Name </label>
					<p><?php echo $result['lname'];?></p>
				</div>

				<div class="form-group col-md-4">
					<label>Mobile No </label>
					<p><?php echo $result['contact'];?></p>
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-6">
					<label>Email </label>
					<p><?php echo $result['email'];?></p>
				</div>
				<div class="form-group col-md-6">
					<label>Property Address </label>
					<p><?php echo $result['unit_number'] ."/".$result['house_number'] .','.$result['street'] .','.$result['suburb'];?></p>
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-12">
					<hr style="margin:0px;">
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-12">
					<label>Message</label>
					<p><?php echo $result['message'];?></p>
				</div>	
<div class="clearfix"></div>				
			</div> 
			<div class="panel-footer">
				<b> Created : <?php echo $result['reg_date']; ?>	</b>		
			</div>
		</div>
		
          
        </main>
      </div>
    </div>

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
