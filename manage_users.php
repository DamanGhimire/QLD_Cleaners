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
  $sql ="SELECT * FROM shiny_users where `user_type`='2' ORDER BY id DESC";
  $result = mysqli_query($link,$sql);
  $cleaner=mysqli_num_rows($result);
  
  $sql1 ="SELECT * FROM shiny_users where `user_type`='3' ORDER BY id DESC";
  $result1 = mysqli_query($link,$sql1);
  $client=mysqli_num_rows($result1);
  
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
			<div id="tab" class="btn-group" data-toggle="buttons-radio">
              <a href="#client" class="btn btn-large btn-info active" data-toggle="tab">Client List</a>
              <a href="#cleaner" class="btn btn-large btn-info" data-toggle="tab">Cleaner List</a>
            </div>
             
            <div class="tab-content">
              <div class="tab-pane active" id="client">
				<div class="table-responsive">
					  <table width="100%"  class="table table-sm">
				  <thead>
				  <tr>
					<th>#Id.</th>
					<th>Username</th>
					<th>Created</th>
					<th>Action</th>
				  </tr>
				  </thead>
				  <tbody>
				  
				  <?php
				  $count=1;
				  while($client=mysqli_fetch_array($result1))
				{
					$id=$client['id'];
					$username=$client['username'];
					$regdate=date('M j Y', strtotime($client['created_at']));

				  echo "
					<tr>
					<th scope='row'><a href='user_detail.php?id=$id'>#$id</a></td>
					 <td><a href='user_detail.php?id=$id'>$username</a></td>
					 <td>$regdate</td>
					 <td><a class='btn btn-primary btn-job' href='user_detail.php?id=$id'>View Detail</a><a type='button' class='btn btn-danger btn-job' href='delete_user.php?id=$id'>Delete</a></td>
					</tr>";
					$count++;
				  }
			  
				  
					?>
					</tbody>
					
				  </table>
						
					  </div>
			  </div>
              <div class="tab-pane" id="cleaner">
				<div class="table-responsive">
					  <table width="100%"  class="table table-sm">
				  <thead>
				  <tr>
					<th>#Id.</th>
					<th>Username</th>
					<th>Created</th>
					<th>Action</th>
				  </tr>
				  </thead>
				  <tbody>
				  
				  <?php
				  $count=1;
				  while($cleaner=mysqli_fetch_array($result))
				{
					$id=$cleaner['id'];
					$username=$cleaner['username'];
					$regdate=date('M j Y', strtotime($cleaner['created_at']));

				  echo "
					<tr>
					<th scope='row'><a href='user_detail.php?id=$id'>#$id</a></td>
					 <td><a href='user_detail.php?id=$id'>$username</a></td>
					 <td>$regdate</td>
					 <td><a class='btn btn-primary btn-job' href='user_detail.php?id=$id'>View Detail</a><a type='button' class='btn btn-danger btn-job' href='delete_user.php?id=$id'>Delete</a></td>
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
