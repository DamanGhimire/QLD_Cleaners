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

    <script>
        $(document).ready(function () {
//            $("#logout").show();
            var username = '<?php echo $_SESSION['username'];?>';
//            alert(username)
            if (username.length > 0) {
                $("#login").hide();
                $("#logout").show();
                $("#welcomeuser").show();
//                if(isadmin==1){
//                    $("#category").show();
//                }
            }
        });
    </script>
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
                            <li class="nav-item active">
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
                                <a class="nav-link" href="login.php" id="login">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="log_out.php" id="logout" style="display:none">Sign Out</a>
                            </li>
                            <li class="nav-item text-nowrap" id="welcomeuser" style="display: none">
                                <font color="white">Welcome <?php echo $_SESSION['username']; ?></font>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
</body>
</html>