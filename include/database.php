<?php
// include 'configure.php';

	/////////////////////
	// signup function //
	/////////////////////
	function signup($data) {
		$link = connect();

		// INSERT needs to match database name
		// because you insert data into the database
		// this is you insert data to the database
		$query = "insert into user values (
		null,'".$data['username']."','".$data['email']."','".$data['password']."')";

		mysqli_query($link, $query);
	}



	////////////////////
	// login function //
	////////////////////
	function login($username, $email, $password) {

		$link = connect();

		// this is you pull out data from the database
		$query = "select * from user where username = '". $username ."' and email = '". $email ."' and password = '". $password ."'";

		// this holds the data
		$results = mysqli_query($link, $query);

		// if ($results) {
			// this will read through each row if there is element in an array
			$row = mysqli_fetch_array($results);

			//var_dump($row["id"]);
	// 		$_SESSION["loggedin"]=true;
	// 		$_SESSION["id"] = $row["id"];
	// 		$_SESSION["username"] = $row["username"];
	// 		$_SESSION["email"] = $row["email"];
	// 		$_SESSION["password"] = $row["password"];
	// 	}
	// 	return true;
	// }
	// return false;
			if (count($row)) {
				return true;
			}else{
				return false;
			}
	}


	/////////////////////
	// create function //
	/////////////////////
	function create($remindDate, $task) {
		$link = connect();

		// INSERT needs to match database name
		// because you insert data into the database
		$query = "INSERT INTO reminder (remindDate, task) VALUES('".$remindDate."' ,'".$task."')";
		
		$result = mysqli_query($link, $query);

		return $result;
	}


	///////////////////
	// view function //
	///////////////////
	function view() {
		$link = connect();

		// * means select all row/data
		$query = "select * from reminder";

		$result = mysqli_query($link, $query);

		$view = array();

		while($row = mysqli_fetch_array($result) ) {
			$detail = array(
				"id" => $row["id"],
				"remindDate" => $row["remindDate"],
				"task" => $row["task"],
			);
			array_push($view, $detail);

		};
		return $view;
	}

	/////////////////////
	// delete function //
	/////////////////////
	function delete($id) {
		$link = connect();

		// for this function, we do not need * because we only delete one row/id when click the button
		$query = "delete from reminder where id = $id";

		$result = mysqli_query($link, $query);

		return $result;
	}

?>
