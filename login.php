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
		exit(header("location: display_reg.php"));		
	}
	else
	{
	
		echo '<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> <script>$(function(){alert("Invalid Username and Password");});</script>';		
	}
}
include_once("header.php");
?>
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
