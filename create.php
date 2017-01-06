<?php

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

include "include/configure.php";
include "include/database.php";

session_start();
	if (!isset($_SESSION['loggedin']) ) {
		header('Location: index.php');
		exit();
	}else {

		if (isset($_POST["submit"]) ) {
			create($_POST["remindDate"], $_POST["task"]);

				header("Location: view.php");
				exit();
		} // end if statement inside if statement
	} // end else
?>