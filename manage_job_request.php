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
  $sql ="SELECT * FROM quote where `user_type`='registered' ORDER BY id DESC";
  $result = mysqli_query($link,$sql);
  $row=mysqli_num_rows($result);
  
  $sql1 ="SELECT * FROM quote where `user_type`='guest' ORDER BY id DESC";
  $result1 = mysqli_query($link,$sql1);
  $row1=mysqli_num_rows($result1);
  
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
			<div id="tab" class="btn-group" data-toggle="buttons-radio">
              <a href="#registered" class="btn btn-large btn-info active" data-toggle="tab">Registered User Request</a>
              <a href="#guest" class="btn btn-large btn-info" data-toggle="tab">Guest User Request</a>
            </div>
             
            <div class="tab-content">
              <div class="tab-pane active" id="registered">
				<h4>Job Details</h4>
				<div class="table-responsive">
					  <table width="100%"  class="table table-sm">
				  <thead>
				  <tr>
					<th>#Id.</th>
					<th>Name</th>
					<th>Property Address</th>
					<th>Type</th>
					<th>email</th>
					<th>Cleaning date</th>
					<th>Mark</th>
					<th>Status</th>
					<th>Action</th>
				  </tr>
				  </thead>
				  <tbody>
				  
				  <?php
				  $count=1;
				  while($row=mysqli_fetch_array($result))
				{
					$id=$row['id'];
					$name=$row['fname'].' '.$row['lname'];
					$address= $row['street'] .','.$row['suburb'];
					$property_type=$row['property_type'];
					$email=$row['email'];
					$pref_clean_start_date= date('M j', strtotime($row['pref_clean_start_date']));
					$regdate=$row['reg_date'];
				  $status=strtoupper($row['status']);

				  echo "
					<tr>
					<th scope='row'><a href='admin_job_detail.php?id=$id'>#$id</a></td>
					 <td><a href='admin_job_detail.php?id=$id'>$name</a></td>
					 <td>$address</td>
					 <td>$property_type</td>  
					 <td>$email</td>  
					 <td>$pref_clean_start_date</td> 
					 <td><a type='button' href='change_status.php?id=$id' class='btn btn-success btn-job'>Mark As Completed</a></td>
					 <td><span class='label label-success'>$status</span></td>
					 <td><a class='btn btn-success btn-job' href='assign_job.php?id=$id'>Assign</a><a type='button' class='btn btn-danger btn-job' href='delete_quote.php?id=$id'>Delete</a></td>
					</tr>";
					$count++;
				  }
			  
				  
					?>
					</tbody>
					
				  </table>
						
					  </div>
			  </div>
              <div class="tab-pane" id="guest">
				<h4>Job Details</h4>
				<div class="table-responsive">
					  <table width="100%"  class="table table-sm">
				  <thead>
				   <tr>
					<th>#Id.</th>
					<th>Name</th>
					<th>Property Address</th>
					<th>Type</th>
					<th>email</th>
					<th>Cleaning date</th>
					<th>Mark</th>
					<th>Status</th>
					<th>Action</th>
				  </tr>
				  </thead>
				  <tbody>
				  
				  <?php
				  $count=1;
				  while($row1=mysqli_fetch_array($result1))
				{
					$id=$row1['id'];
					$name=$row1['fname'].' '.$row1['lname'];
					$address=$row1['street'] .','.$row1['suburb'];
					$property_type=$row1['property_type'];
					$email=$row1['email'];
					$pref_clean_start_date= date('M j', strtotime($row1['pref_clean_start_date']));
					$regdate=$row1['reg_date'];
				  $status=strtoupper($row1['status']);

				  echo "
					<tr>
					<th scope='row'><a href='admin_job_detail.php?id=$id'>#$id</a></td>
					 <td><a href='admin_job_detail.php?id=$id'>$name</a></td>
					 <td>$address</td>
					 <td>$property_type</td>  
					 <td>$email</td>  
					 <td>$pref_clean_start_date</td> 
					 <td><a type='button' href='change_status.php?id=$id' class='btn btn-success btn-job'>Mark As Completed</a></td>
					 <td><span class='label label-success'>$status</span></td>
					<td><a class='btn btn-success btn-job' href='assign_job.php?id=$id'>Assign</a><a type='button' class='btn btn-danger btn-job' href='delete_quote.php?id=$id'>Delete</a></td>
					</tr>";
					$count++;
				  }
			  
				  
					?>
					</tbody>
					
				  </table>
						
					  </div>
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
