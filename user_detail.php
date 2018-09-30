<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
}
?>


<?php
  include("functions/db.php");
  $userid = $_GET['id'];
  $sql ="SELECT * FROM shiny_users where `id`=$userid";
  $query = mysqli_query($link,$sql);
  $row=mysqli_num_rows($query);
  $result = mysqli_fetch_assoc($query);
  //print_r($result);
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
      <span style="color:white; margin:0px;"> <b>QLD Cleaners | Welcome to our Admin Dashboard</b></span>
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
                <a class="nav-link" href="adminDashboard.php">
                  <span data-feather="home"></span>
                  Job Requests <span class="sr-only">(current)</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="manage_job_request.php">
                  <span data-feather="users"></span>
                  Manage Job Requests
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="createUser.php">
                  <span data-feather="users"></span>
                  Create Users
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="manage_users.php">
                  <span data-feather="users"></span>
                  Manage Users
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="manage_invoice.php">
                  <span data-feather="users"></span>
                  Create Invoice
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="change_admin_password.php">
                  <span data-feather="users"></span>
                  Change password
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
						<span class="label label-success ">Active</span>
					</p>
				</h3>  
			</div>
			<div class="panel-body">
				<div class="form-group col-md-12" style="text-transform: uppercase">
					Username : <b> <?php echo $result['username'];?> </b>
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
					<label>Email</label>
					<p><?php echo $result['email'];?></p>
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-12">
					<hr style="margin:0px;">
				</div>
				<div class="clearfix"></div>	

				<div class="form-group col-md-6">
					<label>Address</label>
					<p><?php echo $result['address'];?></p>
				</div>

				<div class="form-group col-md-6">
					<label>Contact</label>
					<p><?php echo $result['contact'];?></p>
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-12">
					<hr style="margin:0px;">
				</div>
				<div class="clearfix"></div>
				<?php if($result['user_type']==2){?>
				<div class="form-group col-md-12">
					<label>Availability</label><br/>
					<?php 
					$availability = explode(",", $result['availability']);
					foreach($availability as $key){?>
					<label class="checkbox-inline" style="display:inline-block; margin-right:5px">
						<input type="checkbox" name="availability[]" disabled checked value="<?php echo $key; ?>"><?php echo ucwords($key); ?>
					</label>
					<?php } ?>
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-12">
					<hr style="margin:0px;">
				</div>
				<div class="clearfix"></div>
				<?php } ?>
			</div> 
			<div class="panel-footer">
				<b>Created : <?php echo date('M j Y, H:i:s', strtotime($result['created_at'])) ?>	</b>		
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
