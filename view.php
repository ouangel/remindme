<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

include "include/configure.php";
include "include/database.php";

// session_start();



?>

<html>
<head>
	<title>Remind Me | A Simplest Reminder Application</title>
	<link rel="shortcut icon" type="img/ico" href="img/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
	<div class="main-section clearfix" id="main-section">
		<div class="wrapper">
			<div class="main" id="create-main">

				<div class="nav clearfix">
					<ul class="clearfix">
						<li>
							<a href="logout.php">Sign Out</a>
						</li>
					</ul>
				</div>

				<div class="add-form clearfix">
					<form class="clearfix" method="POST" action="create.php" id="create-form">
						<div class="field" id="remindDate">
							<input type="text" name="remindDate" id="datepicker" placeholder="Due" required>
						</div>

						<div class="field" id="task">
							<input type="text" name="task" id="create-task" placeholder="+ Add To Do List" required>				
						</div>

						<input type="submit" name="submit" id="submit-btn" value="Add" style="display:none">
					</form>
				</div> <!-- end add form -->

				<div class="view-content">
					<ul class="clearfix" id="sortable">
					<?php
						$reminders = view();
						foreach ($reminders as $print) {
					?> <!-- start foreach loop -->
					
						<li>
							<div class="remindDate"><?php echo $print["remindDate"]; ?></div>
							<div class="task"><?php echo $print["task"]; ?></div>

							<!-- here the name, action, method are not working -->
							<!-- because those tags are only used for the form -->
							<!-- for delete function, we have to use get method -->
							<a class="delete" href="delete.php?id=<?php echo $print['id']; ?>" >
								<!-- <button class="delete-btn">Delete</button> -->
								<img src="img/close.png">
							</a>
						</li>

					<?php
						}
					?> <!-- end foreach -->
					</ul>
				</div> <!-- end view content -->

			</div> <!-- end main -->
		</div> <!-- end wrapper -->
	</div> <!-- end main-section -->

	<script type="text/javascript" src="js/animation.js"></script>

</body>
</html>
