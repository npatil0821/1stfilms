<?php
	//includes db connection
	require_once '../db_connect.php';

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

	//informs user if movie deletion succeeded
	if (isset($_SESSION['del_success']) && $_SESSION['del_success'] == true) {
		$notice = "<p class='text-success'>Movie successfully deleted.</p>";

		unset($_SESSION['del_success']);
	}

	//informs user if movie deletion failed
	else if (isset($_SESSION['del_fail']) && $_SESSION['del_fail'] == true) {
		$notice = "<p class='text-danger'>An error occurred. Please try again.</p>";

		unset($_SESSION['del_fail']);
	}

	//prepares and executes search statement
	$query = $db->prepare('select title, year, rating, genre from movies');
	$query->execute();

	//gets all movies
	$results = $query->fetchAll();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Manage Movies</title>

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

		<!--outputs notice for user-->
		<?php echo $notice; ?>

		<!--title for page register page-->
		<h1 class='lead text-white-50'>Movies</h1>
		<br>

		<!--displays a table to output movie info-->
		<div class='justify-content-center container'>
			<table class='table table-borderless'>
				<thead>
					<tr class='bg-primary'>
						<th scope='col'>Title</th>
						<th scope='col'>Year</th>
						<th scope='col'>Rating</th>
						<th scope='col'>Genre</th>
						<th scope='col'>Delete</th>
					</tr>
				</thead>

				<tbody>
				<?php
					foreach ($results as $row) {
						echo "<tr class='bg-white'>
							<td scope='row'>".$row['title']."</td>
							<td>".$row['year']."</td>
							<td>".$row['rating']."</td>
							<td>".$row['genre']."</td>
							<td>
								<form action='process/delete_movie.php' method='post'>
									<input type='hidden' name='year' value='".$row['year']."'>
									<input type='submit' value='Delete' class='btn btn-primary'>
								</form>
							</td>
						</tr>";
					}
				?>
				</tbody>
			</table>

			<!--links to admin home page-->
			<a href='admin_home.php' class='btn btn-primary'>Admin Home</a>
			<a href='new_movie.php' class='btn btn-primary'>Add Movie</a>
		</div>
	</body>
</html>