<?php
	//includes db connection
	require_once '../db_connect.php';

	//includes session info
	session_start();

	//checks if user is already logged in
	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
		//if already logged in, redirects user to homepage
		$_SESSION['already_li'] = true;
		header('Location: ../home.php');
	}

	//takes input and assigns it to variables
	$user = strtolower(trim($_POST['user']));
	$pass = trim($_POST['pass']);

	//checks if all input was passed
	if (empty($user) || empty($pass)) {
		//if all input was not passed, redirects user to login page
		$_SESSION['login_err'] = true;
		header('Location: ../login.php');

		//closes db connection
		$db = null;
		exit();
	}

	//prepares query for getting password
	$query = $db->prepare('select pass from users where username = :user');
	$query->bindParam(':user', $user);

	//gets password from database
	$query->execute();
	$result = $query->fetch();

	//checks if username exists in db
	if (!$result) {
		//if username does not exist, redirects to login page
		$_SESSION['no_user'] = true;
		header('Location: ../login.php');

		//closes db connection
		$db = null;
		exit();
	}

	//checks if password is correct
	else if (password_verify($pass, $result['pass'])) {
		//if password is correct, redirects to homepage
		$_SESSION['logged_in'] = true;
		$_SESSION['user'] = $user;
		$_SESSION['new_log'] = true;
		header('Location: ../home.php');
	}

	//if password is incorrect, redirects to login page
	else {
		$_SESSION['wrong_pass'] = true;
		header('Location: ../login.php');
	}

	//closes db connection
	$db = null;
	exit();
?>