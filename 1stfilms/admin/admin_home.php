<?php
	//include session info
	session_start();

	//checks if admin is logged in
	if (!isset($_SESSION['admin_li'])) {
		//redirects to log in page if admin is not logged in
		$_SESSION['admin_nli'];
		header('Location: login.php');
		exit();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Admin Home</title>

		<!--includes stylesheet for bootstrap-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>

	<!--sets background color to dark gray, text align to center, and text color in body to white-->
	<body class='bg-dark text-center text-white text-monospace'>
		<!--displays logout button-->
		<div class='container'>
			<div class='row justify-content-end'>
				<a href='process/logout.php' class='mt-2 btn btn-primary'>Log Out</a>
			</div>
		</div>

		<!--thickens font weight of title and changes color to blue-->
		<h1 class='display-4 text-primary font-weight-normal'>1F Admin</h1>
		<br>

		<div class='justify-content-center container'>
			<!--links to manage movies page-->
			<a href='manage_movies.php' class='btn btn-primary'>Manage Movies</a>
			<br><br>

			<!--links to manage users-->
			<a href='manage_users.php' class='btn btn-primary'>Manage Users</a>
		</div>
	</body>
</html>