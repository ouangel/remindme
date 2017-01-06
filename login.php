<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);


include "include/configure.php";
include "include/database.php";

session_start();

if (isset($_SESSION['loggedin'])) {
	header('Location: view.php');
	exit();
}else{
// if username & email & password are set
	if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) ) {
		// check email is valid
		if (preg_match("/^([a-z]|[0-9])+@([a-z]|[0-9])+\.[a-z]{2,3}$/i", trim($_POST['email'])) && preg_match("/^[a-z]{1,10}$/i", trim($_POST['username'])) ) {

			$valid = login($_POST['username'], $_POST['email'], $_POST['password']);
			// if is valid
			if ($valid) {
				
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['password'] = $_POST['password'];
				$_SESSION['loggedin'] = true;
						
				header('Location: view.php');
				exit();
			}else {
				echo "<script>alert('Invalid user information')</script>";
			}
		} // end if preg_match

		// if is invalid
		else{
			echo "<script>alert('Invalid user information')</script>";
		}
	} // end isset
} // end else


?>

<!-- display login form and post to itself -->
<html>
	<head>
		<title>Reminder Me | A Simplest Reminder Application</title>
		<link rel="shortcut icon" type="img/ico" href="img/favicon.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<!-- The exsiting users login dialog -->
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
					</div> <!-- end header-section -->

					<div class="body-section clearfix">

						<div class="login clearfix">
							<form method="POST" action="login.php" id="login-form">
								<div class="form-title">
									<h1>SIGN IN</h1>
								</div>

								<div class="field">
									<label for="username">User Name</label>
									<input type="text" name="username" id="username" required>
								</div>

								<div class="field">
									<label for="email">Email</label>
									<input type="text" name="email" id="email" required>
								</div>

								<div class="field">
									<label for="password">Password</label>
									<input type="password" name="password" id="password" required>
								</div>
								
								<input type="submit" name="login-submit" id="login-submit" value="Login">
							</form>
						</div> <!-- end login -->

						<div class="signup-link clearfix">
							<a href="signup.php">Sign up a new account</a>
						</div>
					</div> <!-- end body-section -->

				</div> <!-- end main -->
			</div> <!-- end wrapper -->
		</div> <!-- end main section -->

	</body>
</html>