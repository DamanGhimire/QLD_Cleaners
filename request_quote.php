<?php
include_once('functions/db.php'); ?>
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
                                <a class="nav-link active" href="request_quote.php">Request Quote</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

<div class="container">
	<div class="row">
		<div class="col-lg-7">
<form id="registration" enctype="multipart/form-data" action="quote_process.php" method="post">
	<div class="form-group">
		<label for="property">Property Type :</label>
			<select name="property" id="property" class="form-control">
				<option selected disabled></option>
				<option>Apartment</option>
				<option>House</option>
				<option>Unit</option>
				<option>Townhouse</option>
			</select>
	</div>	
	<div class="form-group">
		<label for="bedroom">No. of Bedroom :</label>
			<select name="bedroom" id="bedroom" class="form-control">
				<option selected disabled></option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>6+</option>
			</select>
	</div>	
	<div class="form-group">
		<label for="bathroom">No. of Bathroom :</label>
			<select name="bathroom" id="bathroom" class="form-control">
				<option selected disabled></option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>6+</option>
			</select>
	</div>	
	<div class="form-group">
		<label for="reg_date">Registration Date :</label>
		<input type="date" name="reg_date" id="reg_date" class="form-control">
	</div>
	<div class="form-group">
		<label for="name">Name :</label>
		<input type="text"  class="form-control"  name="name" id="name">
	</div>
	<div class="form-group">
		<label for="phone_no">Phone no.:</label>
		<input type="text" name="phone_no" id="phone_no" class="form-control">					
	</div>
	<div class="form-group">
    	<label for="email">Email address</label>
    	<input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
    	<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  	</div>
  	<div class="form-group">
		<label for="address">Address :</label>
		<input type="text"  class="form-control"  name="address" id="address">
	</div>
	<div class="form-group">
		<label for="best_contact">Best Contact :</label>
			<select name="best_contact" id="best_contact" class="form-control">
				<option selected disabled></option>
				<option>Phone</option>
				<option>Email</option>
				<option>Text Msg</option>
			</select>
	</div>	
	<div class="form-group">
		<label for="message">Any Message :</label>
		<textarea name="message" class="form-control"  id="message" rows="5" cols="40"></textarea>
	</div>
	<div>
		<form action="#" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
    <input type="checkbox" required name="checkbox" value="check" id="agree" /> I have read and agree to the <a href="exampleModalLong" data-toggle="modal" data-target="#exampleModalLong">Terms and Conditions and Privacy Policy</a>

<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Customer Service Agreement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <abbr class="">

These terms and conditions constitute the full and complete service agreement (the "Agreement") between you (the "Customer") and QLD Cleaners for the provision of services provided by QLD Cleaners.</br>

Please take some time to review this Agreement. Use of our services constitutes your acceptance of these terms and conditions.</br>

<b> cleaning services</b></br>
Subject to the terms of this Agreement, QLD Cleaners agrees to provide domestic cleaning services (the "Service") to the Customer at an address specified by the Customer (the "Premises").
The Service will be for such cleaning duties as agreed with the Customer at the time of booking.</br>
QLD Cleaners will provide one or more cleaners (the "Cleaner") to attend the Premises to provide the Service at a time and date mutually agreed between QLD Cleaners and the Customer (the "Service Time").
QLD Cleaners endeavours to provide the Service faithfully, diligently and in a timely and professional manner.</br>
 
        </abbr>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        
      </div>
    </div>
  </div>
</div><!-- modal ends-->


    
<form>
	</div>
		<input type="submit" id="submit_personal" class="btn btn-primary" value="Submit">
		</form>
</div>
</div>
</div>			


<?php
include_once("footer.php");
?>

</body>
</html>
