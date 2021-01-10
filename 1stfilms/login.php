<?php
	//includes session info
	session_start();

	$notice = '';

	//informs user if an error occurred while logging in
	if (isset($_SESSION['login_err']) && $_SESSION['login_err'] == true) {
		$notice = 'An error has occurred. Please try again.';

		unset($_SESSION['login_err']);
	}

	//informs user if the username does not exist
	else if (isset($_SESSION['no_user']) && $_SESSION['no_user'] == true) {
		$notice = 'This username does not exist.';

		unset($_SESSION['no_user']);
	}

	//informs user if they have not logged in yet
	else if (isset($_SESSION['need_log']) && $_SESSION['need_log'] == true) {
		$notice = 'Please log in before accessing this content.';

		unset($_SESSION['need_log']);
	}

	else if (isset($_SESSION['wrong_pass']) && $_SESSION['wrong_pass'] == true) {
		$notice = 'Invalid login info.';

		unset($_SESSION['wrong_pass']);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Log In</title>

		<!--includes stylesheet for bootstrap-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>

	<!--sets background color to dark gray, text align to center, and text color in body to white-->
	<body class='bg-dark text-center text-white text-monospace'>
		<!--thickens font weight of title and changes color to red-->
		<h1 class='display-4 text-danger font-weight-normal'>1st Films</h1>
		<br>

		<!--title for page register page-->
		<h1 class='lead text-white-50'>Log In</h1>
		<br>

		<!--outputs notice for the user-->
		<p class='text-danger'><?php echo $notice; ?></p>

		<!--registration form is passed to # through post-->
		<form action='process/login_process.php' method='post'>
			<div class='container form-group'>
				<!--takes username-->
				<div class='row justify-content-center'>
					<label for='user' class='col-md-2'>Username:</label>
					<input type='text' class='col-md-2 form-control' name='user' required>
				</div>

				<!--takes password-->
				<br>
				<div class='row justify-content-center'>
					<label for='pass' class='col-md-2'>Password:</label>
					<input type='password' class='col-md-2 form-control' name='pass' required>
				</div>

				<!--button to submit form information-->
				<br>
				<input type='submit' class='btn btn-large btn-danger col-md-2' value='Submit'>
			</div>
		</form>

		<br>
		<div class='container'>
			<div class='row justify-content-center'>
				<!--link to redirect to login page-->
				<p class='col'>Don't have an account? <a class ='text-danger' href='register.php'>Register!</a></p>
			</div>
			<br>


			<div class='row justify-content-center'>
				<!--link to admin login page-->
				<a href='admin/login.php' class='col text-danger'>Admin Login</a>
			</div>
		</div>

		<!--includes bootstrap js scripts-->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	</body>
</html>