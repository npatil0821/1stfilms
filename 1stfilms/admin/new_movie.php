<?php
	//includes session info
	session_start();

	$notice = '';

	//checks if admin is logged in
	if (!isset($_SESSION['admin_li'])) {
		//redirects to log in page if admin is not logged in
		$_SESSION['admin_nli'];
		header('Location: login.php');
		exit();
	}

	//informs user if there was an error adding a movie
	if (isset($_SESSION['add_err']) && $_SESSION['add_err'] == true) {
		$notice = "<p class='text-danger'>An error has occurred. Please try again.</p>";

		unset($_SESSION['add_err']);
	}

	//informs user if the movie added already exists
	else if (isset($_SESSION['title_taken']) && $_SESSION['title_taken'] == true) {
		$notice = "<p class='text-danger'>This movie has already been added.</p>";

		unset($_SESSION['title_taken']);
	}

	//informs user if the year already has a movie
	else if (isset($_SESSION['year_taken']) && $_SESSION['year_taken'] == true) {
		$notice = "<p class='text-danger'>This year already has a movie for it.</p>";

		unset($_SESSION['year_taken']);
	}

	//informs user if the movie was successfully added
	else if (isset($_SESSION['add_success']) && $_SESSION['add_success'] == true) {
		$notice = "<p class='text-success'>Movie successfully added.</p>";

		unset($_SESSION['add_success']);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Add Movie</title>

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

		<!--title for page register page-->
		<h1 class='lead text-white-50'>Add a Movie</h1>
		<br>

		<!--outputs notification for user-->
		<p class='text-danger text-monospace'><?php echo $notice; ?></p>

		<!--registration form is passed to add_movie.php through post-->
		<form action='process/add_movie.php' method='post'>
			<div class='container text-monospace form-group'>
				<!--takes year-->
				<div class='row justify-content-center'>
					<label for='user' class='col-md-2'>Year:</label>
					<input type='text' class='col-md-2 form-control' name='year' pattern='[0-9]{4}'required>
				</div>
				<br>

				<!--takes title-->
				<div class='row justify-content-center'>
					<label for='title' class='col-md-2'>Title:</label>
					<input type='text' class='col-md-2 form-control' name='title' required>
				</div>
				<br>

				<!--takes rating-->
				<div class='row justify-content-center'>
					<label for='rating' class='col-md-2'>Rating:</label>
					<input type='text' class='col-md-2 form-control' name='rating' required>
				</div>
				<br>

				<!--takes genre-->
				<div class='row justify-content-center'>
					<label for='genre' class='col-md-2'>Genre:</label>
					<input type='text' class='col-md-2 form-control' name='genre' required>
				</div>
				<br>

				<!--takes summary-->
				<div class='row justify-content-center'>
					<label for='summary' class='col-md-2'>Summary:</label>
					<input type='text' class='col-md-2 form-control' name='summary' required>
				</div>
				<br>

				<!--takes writer-->
				<div class='row justify-content-center'>
					<label for='writer' class='col-md-2'>Writer:</label>
					<input type='text' class='col-md-2 form-control' name='writer' required>
				</div>
				<br>

				<!--takes director-->
				<div class='row justify-content-center'>
					<label for='director' class='col-md-2'>Director:</label>
					<input type='text' class='col-md-2 form-control' name='director' required>
				</div>
				<br>

				<!--takes starring actors-->
				<div class='row justify-content-center'>
					<label for='starring' class='col-md-2'>Starring:</label>
					<input type='text' class='col-md-2 form-control' name='starring' required>
				</div>
				<br>

				<!--takes image link-->
				<div class='row justify-content-center'>
					<label for='image' class='col-md-2'>Image:</label>
					<input type='text' class='col-md-2 form-control' name='image' required>
				</div>
				<br>

				<!--takes video link-->
				<div class='row justify-content-center'>
					<label for='video' class='col-md-2'>Video:</label>
					<input type='text' class='col-md-2 form-control' name='video' required>
				</div>

				<!--button to submit form information-->
				<br>
				<input type='submit' class='text-monospace btn btn-large btn-primary col-md-2' value='Submit'>
			</div>
		</form>
		<br>
		<!--links back to manage movies page-->
		<a href='manage_movies.php' class='btn btn-primary'>Manage Movies</a>
		</div>
	</body>
</html>