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
		$notice = "<p class='text-success'>User successfully deleted.</p>";

		unset($_SESSION['del_success']);
	}

	//informs user if movie deletion failed
	else if (isset($_SESSION['del_fail']) && $_SESSION['del_fail'] == true) {
		$notice = "<p class='text-danger'>An error occurred. Please try again.</p>";

		unset($_SESSION['del_fail']);
	}

	//prepares and executes search statement
	$query = $db->prepare('select username, email, first_name, last_name, address from users order by username');
	$query->execute();

	//gets all movies
	$results = $query->fetchAll();
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
		<?php echo $notice ?>

		<!--creates a table to display username, email, first name, last name, and address of each user-->
		<div class='justify-content-center container'>
			<table class='table table-borderless'>
				<thead>
					<tr class='bg-primary'>
						<th scope='col'>Username</th>
						<th scope='col'>Email</th>
						<th scope='col'>First Name</th>
						<th scope='col'>Last Name</th>
						<th scope='col'>Address</th>
						<th scope='col'>Delete</th>
					</tr>
				</thead>

				<tbody>
				<?php
					//loops through results to print out information about each user
					foreach ($results as $row) {
						echo "<tr class='bg-white'>
							<td scope='row'>".$row['username']."</td>
							<td>".$row['email']."</td>
							<td>".$row['first_name']."</td>
							<td>".$row['last_name']."</td>
							<td>".$row['address']."</td>
							<td>
								<form action='process/delete_user.php' method='post'>
									<input type='hidden' name='user' value='".$row['username']."'>
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
	</body>
</html>