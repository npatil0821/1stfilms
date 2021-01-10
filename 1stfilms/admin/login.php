<?php
	//includes session info
	session_start();

	$notice = '';

	//checks if input was received
	if (!empty($_POST['user']) && !empty($_POST['pass'])) {
		$user = trim($_POST['user']);
		$pass = trim($_POST['pass']);

		//checks if user credentials are correct
		if ($user != '1fadmin' || $pass != 'pass123')
			//if credentials are incorrect, informs user
			$_SESSION['wrong_cred'] = true;

		//if credentials are correct, redirects to admin homepage
		else {
			$_SESSION['admin_li'] = true;
			header('Location: admin_home.php');
			exit();
		}
	}

	//informs user if values were not properly passed
	else if (empty($_POST['user']) xor empty($_POST['pass']))
		$_SESSION['login_err'] = true;

	//informs user if there was an error
	if (isset($_SESSION['login_err']) && $_SESSION['login_err'] == true) {
		$notice = 'An error occurred. Please try again.';

		unset($_SESSION['login_err']);
	}

	//informs user if credentials were incorrect
	else if (isset($_SESSION['wrong_cred']) && $_SESSION['wrong_cred'] == true) {
		$notice = 'Incorrect login info. Please try again.';

		unset($_SESSION['wrong_cred']);
	}

	else if (isset($_SESSION['admin_nli']) && $_SESSION['admin_nli'] == true) {
		$notice = 'You must be logged in to access this content.';

		unset($_SESSION['admin_nli']);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Admin Log In</title>

		<!--includes stylesheet for bootstrap-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>

	<!--sets background color to dark gray, text align to center, and text color in body to white-->
	<body class='bg-dark text-center text-white text-monospace'>
		<!--thickens font weight of title and changes color to blue-->
		<h1 class='display-4 text-primary font-weight-normal'>1F Admin</h1>
		<br>

		<!--title for page register page-->
		<h1 class='lead text-white-50'>Log In</h1>
		<br>

		<!--outputs notice for the user-->
		<p class='text-danger'><?php echo $notice; ?></p>

		<!--registration form is passed to # through post-->
		<form action='login.php' method='post'>
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
				<input type='submit' class='btn btn-large btn-primary col-md-2' value='Submit'>
			</div>
		</form>
		<br>

		<!--link to user login page-->
		<div class='container'>
			<div class='row justify-content-center'>
			<a href='../login.php' class='col text-primary'>User Login</a>
			</div>
		</div>
	</body>
</html>