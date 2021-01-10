<?php
	//includes db connection
	require_once 'db_connect.php';

	//includes session info
	session_start();

	//checks if user is logged in
	if (!isset($_SESSION['logged_in'])) {
		//if user is not logged in, redirects to login page
		$_SESSION['need_log'] = true;
		header('Location: login.php');

		//closes db connection
		$db = null;
		exit();
	}

	//gets value passed and assigns it to variable
	$year = $_POST['year'];

	//checks if values were properly passed
	if (empty($year)) {
		//if values were not passed, redirects user to homepage
		$_SESSION['mi_err'] = true;
		header('Location: home.php');

		//closes db connection
		$db = null;
		exit();
	}

	//prepares query
	$query = $db->prepare('select title, video from movies where year = :year');
	$query->bindParam(':year', $year);

	//gets query results
	$query->execute();
	$result = $query->fetch();

	//checks if query was successful
	if (!$result) {
		//if query was not successful, redirects user to homepage
		$_SESSION['mi_err'] = true;
		header('Location: home.php');
	}

	//if query was successful, assigns results to variables
	else {
		$title = $result['title'];
		$video = $result['video'];
	}

	//closes db connection
	$db = null;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Movie Player</title>

		<!--includes stylesheet for bootstrap-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>

	<!--sets background color to dark gray, text align to center, and text color in body to white-->
	<body class='bg-dark text-white text-center text-monospace'>
		<!--displays logout button-->
		<div class='container'>
			<div class='row justify-content-end'>
				<a href='process/logout.php' class='mt-2 btn btn-danger'>Log Out</a>
			</div>
		</div>
		<!--thickens font weight of title and changes color to red-->
		<h1 class='display-4 text-danger text-center font-weight-normal'>1st Films</h1>
		<br>

		<div class='container'>
			<!--displays title of movie-->
			<h1 class='text-center'><?php echo $title; ?></h1>

			<!--displays video player-->
			<video width='80%' controls>
				<source src='<?php echo $video; ?>' type='video/mp4'>
			</video>
			<br><br>
			<!--links user to homepage-->
			<a href='home.php' class='btn btn-danger'>Other Movies</a>
		</div>
	</body>
</html>