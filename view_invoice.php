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
   
    <title>Client Dashboard</title>

    <!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
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
                        <a class="nav-link" href="request_quote.php">Request Quote</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="edit_client_profile.php">Profile</a>
                    </li>
					
					<li class="nav-item">
                        <a class="nav-link" href="clientinvoice.php">My Invoice</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="change_client_password.php">Change password</a>
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
