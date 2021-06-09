<!DOCTYPE html>
<html>

<head>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQLi - Bypass Auth</title>
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <center>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="images/img-07.png" alt="IMG" height="80%" width="80%">
                    </div>
                    <?php
                require('db.php');
                // SQL Querry Section Login
                if (isset($_POST['submit'])) {
                    $username = $_REQUEST['username'];
                    $password = $_REQUEST['password'];
                    // Check user is exist in the database
                    $query    = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
                    $result = mysqli_query($con, $query) or die($mysqli);
                    $rows = mysqli_num_rows($result);
					// Kalo Login Beneran
					if ($rows > 0) {
						$query    = "SELECT * FROM `users` WHERE username='$username'";
						$result = mysqli_query($con, $query) or die($mysqli);
						$rowss = mysqli_num_rows($result);
						if($rowss == 1){
							header("Location: cie-login.html");
						}
						else{
							header("Location: cie-sqli.html");                        
						}
                    } 
					else {    
                        echo "<div class='login100-form'>
			                 <br><br>
                            <center><div class='alert alert-danger' role='alert'>Login Failed</div></center><br/>
			            	  <br><br>
                            <form action='index.php'>
                            <button class='login100-form-btn' href='index.php' >
                               Login Again
                            </button>
                            </form>
                            </div>";
                    }
                }			
				else {
                ?>
                    <form class="login100-form validate-form" method="post" name="login">
                        <span class="login100-form-title"><br>
                            Member Login
                        </span>
                        <div class="wrap-input100 validate-input" data-validate="Username Is Required">
                            <input class="input100" type="text" name="username" placeholder="Username">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" value="Login" name="submit">
                                Login
                            </button>
                        </div>
                    </form>
        <?php 
				}
		?>
                </div>
            </div>
        </div>
    </center>
</body>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
</html>