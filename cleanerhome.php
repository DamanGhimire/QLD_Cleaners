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
$sql1 ="SELECT * FROM quote_cleaner where `user_id` like '%$userid%' ORDER BY id DESC";
$query1 = mysqli_query($link,$sql1);
$row=mysqli_num_rows($query1);
?>

<!doctype html>
<html lang="en">
<head>

    <title>Cleaner Dashboard</title>

    <!-- Bootstrap core CSS -->
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
                            <span data-feather="users"></span>
                            Profile <span class="sr-only"></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="change_cleaner_password.php">
                            <span data-feather="edit"></span>
                            Change Password <span class="sr-only"></span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
			<h2>Assigned Jobs</h2>
			
				<div class="table-responsive">
					  <table width="100%"  class="table table-sm">
				  <thead>
				  <tr>
					<th>#ID</th>
					<th>#Quote Id.</th>
					<th>Property Type</th>
					<th>Property Address</th>
					<th>Cleaning Date</th>
					<th>Action</th>
				  </tr>
				  </thead>
				  <tbody>
				  
				  <?php
				  $count=1;
				  while($row=mysqli_fetch_array($query1))
				{
					$id=$row['id'];
					$quoteid = $row['quote_id'];
					$date = date('M j, Y', strtotime($row['assign_date']));
					
					$sql ="SELECT * FROM quote where `id`='$quoteid'";
					$query = mysqli_query($link,$sql);
					$row1=mysqli_num_rows($query);
					$result1 = mysqli_fetch_assoc($query);
					
					?>

				<tr>
					<th scope='row'><a href="view_detail.php?id=<?php echo $quoteid;?>">#<?php echo $id; ?></a></td>
					<th scope='row'><a href="view_detail.php?id=<?php echo $quoteid;?>">#<?php echo $quoteid; ?></a></td>
					<td><?php echo $result1['property_type'];?></td>
					<td><?php echo $result1['unit_number'] ."/".$result1['house_number'] .','.$result1['street'] .','.$result1['suburb'];?></td>
					<td><?php echo $date; ?></td>  
					<td><a class='btn btn-primary btn-job' href="view_detail.php?id=<?php echo $quoteid; ?>">View Detail</a></td>
				</tr>
				<?php	$count++;
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
