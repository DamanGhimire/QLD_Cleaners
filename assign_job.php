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
  $jobid = $_GET['id'];
  $sql ="SELECT * FROM quote where `id`=$jobid";
  $query = mysqli_query($link,$sql);
  $row=mysqli_num_rows($query);
  $result = mysqli_fetch_assoc($query);
  ?>

  
  <?php 
						//$day = strtolower(date('l', strtotime($date)));
						$sql ="SELECT * FROM shiny_users where `user_type`=2";
						$query = mysqli_query($link,$sql);
						$row=mysqli_num_rows($query);
						
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
                <a class="nav-link active" href="manage_job_request.php">
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
                <a class="nav-link" href="manage_users.php">
                  <span data-feather="users"></span>
                  Manage Users
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">
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
						<span class="label label-success "><?php echo strtoupper($result['status']);?></span>
					</p>
				</h3>  
			</div>
			<div class="panel-body">
			<?php if(isset($_SESSION['msgs'])){?>
				<div class="alert alert-success alert-dismissible alert-pass-change">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><?php echo $_SESSION['msgs'];?></strong> 
					<?php unset($_SESSION['msgs']); ?>
				</div>
				<?php } ?>
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
				<div class="form-group col-md-4">
					Property Address : <b> <?php echo $result['unit_number'] ."/".$result['house_number'] .','.$result['street'] .','.$result['suburb'];?></b>
				</div>	
				<div class="clearfix"></div>
				<div class="form-group col-md-12">
					<hr style="margin:0px;">
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-6">
					Preferred Cleaning date : <b><?php echo date('M j Y', strtotime($result['pref_clean_start_date'])); ?> </b>
				</div>
				
							
				<div class="clearfix"></div>
				<div class="form-group col-md-12">
					<hr style="margin:0px;">
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-12"><b>Please Select atleast 1 cleaner</b></div>
				<form action="assign_process.php?id=<?php echo $result['id']; ?>" method="post">
					<?php $date = $result['pref_clean_start_date']; ?>
					<input type="hidden" name="start_date" value="<?php echo $date; ?>">
				
				<div class="form-group col-md-4">
					<div class="assign">
						<label><?php echo date('M j Y, l', strtotime($date)); ?></label>
						
					<?php 
						$day = strtolower(date('l', strtotime($date)));
						$sql ="SELECT * FROM shiny_users where `availability` LIKE '%$day%'";
						$query = mysqli_query($link,$sql);
						$row = mysqli_num_rows($query);
						$count = 1;
						while($users = mysqli_fetch_assoc($query)){ 
							$sql1 ="SELECT * FROM quote_cleaner where `quote_id`=$jobid and `assign_date`='$date'";
							//echo $sql;
							$query1 = mysqli_query($link,$sql1);
							$row1 = mysqli_num_rows($query1);
							//echo $row;
							$user1 = mysqli_fetch_assoc($query1);
							$res = explode(",",$user1['user_id']);
							//print_r($res);
					?>
					<label class="checkbox-inline">
						<input type="checkbox" name="assign[]" value="<?php echo $users['id']; ?>" <?php if(in_array($users['id'], $res)){echo "checked";}?>><?php echo $users['username']; ?>
					</label>
					<?php $count++; } ?>
					
						
						
					</div>
				</div>
				
				<div class="clearfix"></div>
				<input class="btn btn-primary" type="submit" value="Save">
				</form>
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
