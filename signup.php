<?php

// you can use this to see where errors are
// error_reporting(E_ALL);
// ini_set("display_errors", 1);


include "include/configure.php";
include "include/database.php";

session_start();

// check each field
if (isset($_POST["signup-submit"])) {

	$valid=true;

	if(!preg_match("/^[a-z]{1,10}$/i", trim($_POST['username']))){
		echo "Your username is invalid!";
		$valid = false;
	}

	if(!preg_match("/^([a-z]|[0-9])+@([a-z]|[0-9])+\.[a-z]{2,3}$/i", trim($_POST['email']))){
		echo "Your email is invalid!";
		$valid = false;
	}

	if(!preg_match("/^([a-z]|[0-9])+$/", trim($_POST['password']))){
		echo "Your password is invalid!";
		$valid = false;
	}
	
	// if is valid, save data to the database
	if($valid){

		$data["username"] = $_POST["username"];
		$data["email"] = $_POST["email"];
		$data["password"] = $_POST["password"];
		// echo "<pre>";
		signup($data);

		// login the user by storing the email and setting loggedin variable
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['loggedin'] = true;

		//this is boolen true so dont use quotation mark
		header("Location: view.php");
		exit();
	}// end else

} // end isset submit
?>

<!-- New users register dialog -->
<html>
	<head>
		<title>Remind Me | A Simplest Reminder Application</title>
		<link rel="shortcut icon" type="img/ico" href="img/favicon.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	
	<body>
		<div class="main-section clearfix">
			<div class="wrapper">
				<div class="main">

					<div class="header-section" id="head">
						<div class="header clearfix">
							<!-- <div class="logo">
								<a href="index.php">
									<img src="img/logo.png" alt="logo">
								</a>
							</div> -->
							<div class="head-title">
								<a href="index.php">Remind Me</a>
							</div>
						</div> <!-- end header -->

						<!-- <div class="header-description">
							<p>Welcome to Remind Me! </p>
						</div> -->
					</div> <!-- end header-section -->

					<div class="body-section clearfix">
						<!-- <div class="description">
							<div class="description-header">
								<div class="description-title">
									<h1>Sign Up for A New Account</h1>
								</div>
								<div class="description-body">
									<p>An reminder application that designs for teams to share and use.</p>
									<p>An reminder application that designs for teams to share and use.</p>
									<p>An reminder application that designs for teams to share and use.</p>
									<p>An reminder application that designs for teams to share and use.</p>
								</div>
							</div>
						</div> --> <!-- end description -->

						<div class="signup">
							<form method="POST" action="signup.php" id="signup-form">
								<div class="form-title">
									<h1>SIGN UP</h1>
								</div>

								<div class="field">
									<label for="username">User Name</label>
									<input type="text" name="username" id="signup-user" required>
								</div>

								<div class="field">
									<label for="email">Email</label>
									<input type="text" name="email" id="signup-email" required>
								</div>

								<div class="field">
									<label for="password">Password</label>
									<input type="password" name="password" id="signup-password" required>
								</div>

								<input type="submit" name="signup-submit" id="signup-submit" value="Submit">
							</form>
						</div>
					</div> <!-- end body section -->

				</div> <!-- end main -->
			</div> <!-- end wrapper -->
		</div> <!-- end main section -->
	</body>
</html>
