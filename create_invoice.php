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
  
  $sql1 ="SELECT * FROM invoice where `quote_id`=$jobid";
  $query1 = mysqli_query($link,$sql1);
  $row1=mysqli_num_rows($query1);
  $invoice = mysqli_fetch_assoc($query1);
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
                <a class="nav-link" href="manage_users.php">
                  <span data-feather="users"></span>
                  Manage Users
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="manage_invoice.php">
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
				<?php
				$totalday = 1;
				?>
				<h3 class="panel-title"> #<?php echo $result['id']; ?>	[<?php echo date('M j, Y', strtotime($result['pref_clean_start_date'])); ?>]
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
				<?php if($row1==0){?>
				<form action="<?php echo "invoice_process.php"; ?>" method="post">
					<input type="hidden" name="quoteid" value="<?php echo $result['id']; ?>">
					<input type="hidden" name="userid" value="<?php echo $result['user_id']; ?>">
					<input type="hidden" name="usertype" value="<?php echo $result['user_type']; ?>">
					
					<div class="form-group">
                        <label for="client">Client:</label>
                        <input type="text" name="client" id="client" class="form-control" value="<?php echo $result['fname']." ".$result['lname'] ;?>" disabled required>
                    </div>
					
					<div class="col-md-6 form-group">
                        <label for="prptype">Property Type:</label>
                        <input type="text" name="property_type" id="prptype" class="form-control" value="<?php echo $result['property_type'];?>" disabled required>
                    </div>
					
					<div class="col-md-6 form-group">
                        <label for="bedroom">No. of Bedroom:</label>
                        <input type="text" name="bedroom" id="bedroom" class="form-control" value="<?php echo $result['no_of_bedroom'];?>" disabled required>
                    </div>
					
					<div class="col-md-6 form-group">
                        <label for="bathroom">No. of Bathroom:</label>
                        <input type="text" name="bathroom" id="bathroom" class="form-control" value="<?php echo $result['no_of_bathroom'];?>" disabled required>
                    </div>
					
					<div class="col-md-6 form-group">
                        <label for="days">No. of Days:</label>
                        <input type="text" name="days" id="days" class="form-control" value="<?php echo $totalday; ?>" disabled required>
                    </div>
					
					<div class="form-group">
                        <label for="total">Total Cost (AUD):</label>
                        <input type="text" name="total" id="total" class="form-control" value="" required>
                    </div>
					
					<input type="submit" class="btn btn-primary" value="Submit">
				</form>		
					<?php } else{ ?>
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
					Client : <b><?php echo $result['fname']." ".$result['lname'] ;?> </b>
				</div>
				<div class="form-group col-md-6">
					No. of Days : <b><?php echo $totalday; ?> </b>
				</div>	
							
				<div class="clearfix"></div>
				
				<div class="form-group col-md-12">
					<table width="100%"  class="table table-sm">
					  <thead>
					  <tr>
						<th>No. of Days</th>
						<th>Base rate per day (AUD)</th>
						<th>Total (AUD)</th>
					  </tr>
					  </thead>
					  <tbody>
						<tr>
							<td><?php echo $totalday; ?></td>
							<td><?php  echo $invoice['total']; ?></td>
							<td><b><?php  echo $invoice['total']; ?></b></td>
						</tr>
						
					  </tbody>
					</table>
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-12">
					<hr style="margin:0px;">
				</div>
				<div class="clearfix"></div>	
					<?php } ?>
			</div> 
			<div class="panel-footer">
				<b> Created : <?php echo $invoice['created']; ?>	</b>		
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
