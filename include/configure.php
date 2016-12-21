<?php

	function connect() {
		$host="localhost";
		$username="root";
		$password="root";
		$database="reminder";

		// $host must be at the first
		$link = mysqli_connect($host,$username,$password,$database);

		// if(mysqli_connect_errno()) {
		// 	echo 'error: '.mysqli_connect_error();
		// }

		return $link;
	}

?>