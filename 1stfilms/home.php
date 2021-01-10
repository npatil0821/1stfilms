<?php
	//includes db connection
	require_once 'db_connect.php';

	//includes session info
	session_start();

	$notice = '';

	//checks if user is logged in
	if (!isset($_SESSION['logged_in'])) {
		//if user is not logged in, redirects to login page
		$_SESSION['need_log'] = true;
		header('Location: login.php');

		//closes db connection
		$db->close();
		exit();
	}

	//informs the user if they have successfully registered
	else if (isset($_SESSION['reg_success']) && $_SESSION['reg_success'] == true) {
		$notice = "<p class='text-success'>You have successfully registered!</p>";

		unset($_SESSION['reg_success']);
	}

	//informs the user if they are already logged in
	else if (isset($_SESSION['already_li']) && $_SESSION['already_li'] == true) {
		$notice = "<p class='text-danger'>You are already logged in.</p>";

		unset($_SESSION['already_li']);
	}

	//informs the user they have newly logged in
	else if (isset($_SESSION['new_log']) && $_SESSION['new_log'] == true) {
		$notice = "<p class='text-success'>You are now logged in!</p>";

		unset($_SESSION['new_log']);
	}

	else if (isset($_SESSION['mi_err']) && $_SESSION['mi_err'] == true) {
		$notice = "<p class='text-danger'>An error has occurred. Please try again.</p>";

		unset($_SESSION['mi_err']);
	}

	$stmt = 'select year, title, summary, image from movies';


	//checks if any search terms were input
	if (!empty($_POST['title']) || !empty($_POST['genre']) || !empty($_POST['rating'])) {
		$stmt = $stmt.' where';

		//adds title to query if title was input
		if (!empty($_POST['title'])) {
			$title = trim($_POST['title']);
			$stmt = $stmt.' title like :title';

			if (!empty($_POST['genre']) || !empty($_POST['rating']))
				$stmt = $stmt.' or';
		}

		//adds genre to query if genre was input
		if (!empty($_POST['genre'])) {
			$genre = $_POST['genre'];
			$stmt = $stmt.' genre like :genre';

			if (!empty($_POST['rating']))
				$stmt = $stmt.' or';
		}

		//adds rating to query if rating was input
		if (!empty($_POST['rating'])) {
			$rating = $_POST['rating'];
			$stmt = $stmt.' rating = :rating';
		}
	}

	//prepares query
	$query = $db->prepare($stmt);

	//binds title parameter if exists
	if (!empty($title)) {
		$title = '%'.$title.'%';
		$query->bindParam(':title', $title);
	}

	//binds genre parameter if exists
	if (!empty($genre)) {
		$genre = '%'.$genre.'%';
		$query->bindParam(':genre', $genre);
	}

	//binds rating parameter if exists
	if (!empty($rating))
		$query->bindParam(':rating', $rating);

	//runs query and gets results
	$query->execute();
	$results = $query->fetchAll();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Home</title>

		<!--includes stylesheet for bootstrap-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

		<style>
		/*causes movie info to be displayed when hovered over*/
			.transparent {
				background-color: rgba(0, 0, 0, 0.5);
				opacity: 0;
			}

			.transparent:hover {opacity: 1;}

			.card-img {
				width: 100%;
				height: 100%;
				object-fit: cover;}

		</style>
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

		<!--outputs notice for user-->
		<?php echo $notice; ?>
		
		<!--search bar which takes movie title, genre, and rating-->
		<div class='container'>
			<form action='home.php' method='post'>
				<div class='form-row'>
					<!--takes movie title-->
					<div class='col-6'>
						<input type='text' name='title' class='form-control' placeholder='Movie Title'>
					</div>

					<!--takes genre-->
					<div class='col-3'>
						<select id='genre' name='genre' class='form-control'>
							<option value=''>Select genre</option>
							<option value='action'>Action</option>
							<option value='adventure'>Adventure</option>
							<option value='animation'>Animation</option>
							<option value='comedy'>Comedy</option>
							<option value='crime'>Crime</option>
							<option value='drama'>Drama</option>
							<option value='family'>Family</option>
							<option value='fantasy'>Fantasy</option>
							<option value='sci-fi'>Sci-Fi</option>
							<option value='thriller'>Thriller</option>
						</select>
					</div>

					<!--takes rating-->
					<div class='col-2'>
						<select id='rating' name='rating' class='form-control'>
							<option value=''>Select rating</option>
							<option value='G'>G</option>
							<option value='PG'>PG</option>
							<option value='PG-13'>PG-13</option>
						</select>
					</div>

					<!--submits input-->
					<div class='col-1'>
						<input type='submit' class='btn btn-danger' value='Search'>
					</div>
				</div>
			</form>
		</div>
		<br>

		<!--displays movies. uses search criteria if applied-->
		<div class='container bg-dark overflow-auto'>
			<div class='row justify-content-center no-gutters'>
			<?php

				if ($results) {
					//outputs all results passed
					foreach ($results as $row) {
						echo "<div class='card col-2 text-center bg-dark'>
							<img src='".$row['image']."' class='card-img' alt='movie image'>
							<div class='card-img-overlay overflow-auto transparent'>
								<h5 class='card-title'>".$row['year']."</h5>
								<h6 class='card-title'>".$row['title']."</h6>
								<p class='card-text'>".$row['summary']."
								<form action='movie_info.php' method='post'>
									<input type='hidden' name='year' value='".$row['year']."'>
									<input class='btn btn-danger' type='submit' value='More'>
								</form>
							</div>
						</div>";
					}
				}

				else {
					echo "<p class='text-danger'>No results.</p>";
				}
			?>
			</div>
		</div>

		<!--includes bootstrap js scripts-->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	</body>

	<?php
		//closes db connection
		$db = null;
	?>
</html>