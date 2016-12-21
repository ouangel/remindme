<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include "include/configure.php";
include "include/database.php";

// session_start();

// in this delete page, it is not neccessary to use if(isset) function to delete the data in database
// the $_POST and action are only use for form
// here in view.php we use a button to create a delete function

	// $id = $_GET["id"];
	delete($_GET["id"]);
		
		header("Location: view.php");
		exit();
	

?>