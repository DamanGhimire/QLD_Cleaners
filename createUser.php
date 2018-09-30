

<?php
require_once 'functions/db.php';
//  $sql ="SELECT * FROM shiny_works";
//  $result = mysqli_query($link,$sql);
//  $row=mysqli_num_rows($result);


$username = $password = $user_type = "";
$username_err = $password_err = $user_type_err = "";

// Processing form data when form is submitted
print 'this is running';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print'this is going to register';
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM shiny_users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if (empty(trim($_POST['password']))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST['password'])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST['password']);
    }

    // Validate confirm password

    if (empty(trim($_POST["usertype"]))) {
        $user_type_err = 'Please select user type';
    }

    $usertype = trim($_POST['usertype']);


    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($user_type_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO shiny_users (username,password,user_type) VALUES (?,?,?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_user_type);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_user_type = $user_type;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: createUser.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}

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
    <span style="color:white; margin:0px;"> <b>QLD Cleaners | Welcome to our Client Dashboard</b></span>
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
                            Job Requests</span>
                        </a>
                    </li>

                    <li class="nav-item">
                <a class="nav-link" href="manage_job_request.php">
                  <span data-feather="users"></span>
                  Manage Job Requests
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link active" href="createUser.php">
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
            <h2>Create Users</h2>
            <!--create user form-->
            <form class="" action="registeruser.php" method="post">

                <!--						<div class="form-group">-->
                <!--							<label for="name" class="cols-sm-2 control-label">User's Full Name</label>-->
                <!--							<div class="cols-sm-10">-->
                <!--								<div class="input-group">-->
                <!--									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                <!--									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>-->
                <!--								</div>-->
                <!--							</div>-->
                <!--						</div>-->
                <!---->
                <!--						<div class="form-group">-->
                <!--							<label for="email" class="cols-sm-2 control-label">User Email</label>-->
                <!--							<div class="cols-sm-10">-->
                <!--								<div class="input-group">-->
                <!--									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                <!--									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>-->
                <!--								</div>-->
                <!--							</div>-->
                <!--						</div>-->

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Username</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username" id="username"
                                   placeholder="Enter your Username" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password" required
                                   placeholder="Enter your Password"/>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <label for="user category" class="cols-sm-2 control-label">User Category</label>
                    <?php
                    $sql = "SELECT * FROM user_type";
                    $result = mysqli_query($link, $sql);
                    $select = '<select name="usertype" class="form-control" value="select user type" required>';
                    while ($rs = mysqli_fetch_array($result)) {
                        $select .= '<option value="' . $rs['id'] . '">' . $rs['id_desc'] . '</option>';
                    }
                    $select .= '</select>';
                    echo $select;
                    ?>
                </div>
                <div class="form-group ">
                    <input type="Submit" class="btn btn-primary" value="Register"></input>
                </div>

            </form>
        </main>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
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
