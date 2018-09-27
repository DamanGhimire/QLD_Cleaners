<?php
error_reporting(0);

session_start();
include('functions/db.php');
	if(isset($_POST['submit'])) {
	$uname=mysql_escape_String($_POST['username']);
	$password=mysql_escape_String($_POST['password']);
	$pwd=md5($password);	
	$query=mysql_query("SELECT * from shiny_users where username ='$uname' and password='$password' LIMIT 1");
	$thisrow=mysql_num_rows($query);
	$p=mysql_fetch_array($query);
	if($p)
	{
		$_SESSION["user"]=$uname;
		exit(header("location: adminDashboard.php"));		
	}
	else
	{
	
		echo '<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> <script>$(function(){alert("Invalid Username and Password");});</script>';		
	}
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link href="" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    
</head>
<body>

<!-- Navigation -->
<div>
    <div class="row" >
        <div class="col-md-12">
            <div class="header">
                <nav class="navbar navbar-expand-lg navbar-light" style="color:white" >
                    <a class="navbar-brand" href="Index.php"><img src="img/new-logo.png" style="margin: 0px"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto" >
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Services
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#1a75ff">
                                    <a class="dropdown-item" href="endofleasecleaning.php">End of Lease Cleaning</a>
                                    <a class="dropdown-item" href="carpetcleaning.php">Carpet Cleaning</a>
                                    <a class="dropdown-item" href="windowcleaning.php">Window Cleaning</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact_us.php">Contact us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="request_quote.php">Request Quote</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

	<div class="container">
		<div class="jumbotron">
			<div class="row">
				<div class="col-xs-6 col-md-4" >
					<div id="loginbox" style="margin-top:10px;">                    
            			<div class="panel panel-info" >
                    		<div class="panel-heading">
                        		<div class="panel-title">Login</div> 
                   		</div>     
	                    <div style="padding-top:30px" class="panel-body" >
    	   	                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-9"></div>                            
            	            <form id="loginform" class="form-horizontal" role="form"  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" id="login-username" name="username" class="form-control" placeholder="Enter Username" autofocus="autofocus" autocomplete="off" required/>                                        
                            </div>                                
                           	<div style="margin-bottom: 25px" class="input-group">
                            	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" id="login-password" class="form-control" name="password" placeholder="Enter Password" autocomplete="off" required>

                            </div> 
                            <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
        	                    <div class="col-sm-12 controls">
            	                	<input type="submit" name="submit" class="btn btn-success" value="Login">
	            	            </div>

                             </div>
                            </form>     
                        </div>                     
                    	</div>  
					</div>
				</div>
    		</div>
    	</div>
    </div>

<?php
include_once("footer.php");
?>

</body>
</html>
