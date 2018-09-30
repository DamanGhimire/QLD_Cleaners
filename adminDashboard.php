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
  $sql ="SELECT * FROM quote";
  $result = mysqli_query($link,$sql);
  $row=mysqli_num_rows($result);
  
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
                <a class="nav-link active" href="adminDashboard.php">
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
                <a class="nav-link" href="manage_invoice.php">
                  <span data-feather="users"></span>
                  Create Invoice
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="change_admin_password.php">
                  <span data-feather="edit"></span>
                  Change password
                </a>
              </li>
              
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Welcome to Admin Dashboard</h1>
          </div>

          <h2>Job Details</h2>
          <div class="table-responsive">
		  <table width="100%"  class="table table-sm">
      <thead>
      <tr>
        <th>Id.</th>
        <th>Name</th>
        <th>Property Address</th>
        <th>Property Type</th>
        <th>Bedroom</th>
        <th>Bathroom</th>
        <th>email</th>
        <th>Registration date</th>
        <th>Preferred Cleaning date</th>
        <th>Message</th>
        <th>Status</th>
      </tr>
      </thead>
      <tbody>
      
      <?php
      $count=1;
      while($row=mysqli_fetch_array($result))
    {
        $id=$row['id'];
        $name=$row['fname'].' '.$row['lname'];
        $address=$row['unit_number'] ."/".$row['house_number'] .','.$row['street'] .','.$row['suburb'];
        $property_type=$row['property_type'];
        $no_bedroom=$row['no_of_bedroom'];
        $no_bathroom=$row['no_of_bathroom'];
        $email=$row['email'];
        $regdate=$row['reg_date'];
        $pref_clean_start_date=$row['pref_clean_start_date'];
      $message=$row['message'];
      $status=$row['status'];

      echo "
        <tr>
		<td>$id</td>
         <td>$name</td>
         <td>$address</td>
         <td>$property_type</td>          
         <td>$no_bedroom</td> 
         <td>$no_bathroom</td>
         <td>$email</td>          
         <td>$regdate</td> 
         <td>$pref_clean_start_date</td> 
         <td>$message</td>
         <td>$status</td>

        </tr>";
        $count++;
      }
  
      
        ?>
        </tbody>
        
      </table>
            
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

  </body>
</html>
