
<?php
  include("functions/db.php");
  $sql ="SELECT * FROM shiny_works";
  $result = mysql_query($sql);
  $row=mysql_num_rows($result);
  
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
      <span style="color:white; margin:0px;"> <b>QLD Cleaners</b></span>
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
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="createUser.php">
                  <span data-feather="users"></span>
                  Create Users
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
        <th>Sl.No.</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Service Date</th>
        <th>Property Type</th>       
        <th>No. of Bedrooms</th>
        <th>No. of Bathrooms</th>
        <th>Best Contact</th>
        <th>Message</th>
      </tr>
      </thead>
      <tbody>
      
      <?php
      $count=1;
      while($row=mysql_fetch_array($result))
    {
      $property_type=$row['property_type'];
      $no_bedroom=$row['no_bedroom']; 
      $no_bathroom=$row['no_bathroom'];
      $email=$row['email'];
      $service_date=$row['service_date'];
      $name=$row['name'];
      $phone=$row['phone'];
      $best_contact=$row['best_contact'];
      $address=$row['address'];
      $message=$row['message'];
      $status=$row['status'];

      echo "
        <tr>
		<td>$count</td>
         <td>$name</td>
         <td>$phone</td>
         <td>$email</td>          
         <td>$address</td> 
         <td>$service_date</td>
         <td>$property_type</td>          
         <td>$no_bedroom</td> 
         <td>$no_bathroom</td> 
         <td>$best_contact</td> 
         <td>$message</td>

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

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
