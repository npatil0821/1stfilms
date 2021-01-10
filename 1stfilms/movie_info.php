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
	$query = $db->prepare('select * from movies where year = :year');
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
		$rating = $result['rating'];
		$genre = $result['genre'];
		$summary = $result['summary'];
		$writer = $result['writer'];
		$director = $result['director'];
		$starring = $result['starring'];
		$image = $result['image'];
	}

	//closes db connection
	$db = null;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Movie Info</title>

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
			<div class='row justify-content-center'>
				<!--displays movie image-->
				<img src='<?php echo $image; ?>' alt='movie image' class='float-left rounded'>

				<!--lists title, year released, rating, genre, writer, director, starring actors, and summary of the movie-->
				<div class='col-6 text-left'>
				<p>
					<b class='text-danger'>Title</b>: <?php echo $title; ?>
					<br>
					<b class='text-danger'>Year</b>: <?php echo $year; ?>
					<br>
					<b class='text-danger'>Rating</b>: <?php echo $rating; ?>
					<br>
					<b class='text-danger'>Genre</b>: <?php echo $genre; ?>
					<br>
					<b class='text-danger'>Writer</b>: <?php echo $writer; ?>
					<br>
					<b class='text-danger'>Director</b>: <?php echo $director; ?>
					<br>
					<b class='text-danger'>Starring</b>: <?php echo $starring; ?>
					<br>
					<b class='text-danger'>Summary</b>: <?php echo $summary; ?>
					</p>
					<div class='container'>
						<br>
						<div class='row justify-content-center'>
							<!--links user to movie player-->
							<form action='video_player.php' method='post'>
								<input type='hidden' name='year' value='<?php echo $year; ?>'>
								<input type='submit' value='Watch Now' class='mx-2 btn btn-danger'>
							</form>

							<!--links user to homepage page-->
							<a href='home.php' class='btn btn-danger mx-2'>Other Movies</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--includes bootstrap js scripts-->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	</body>
</html>