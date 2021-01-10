<?php
	//includes db connection
	require_once '../db_connect.php';

	//includes session info
	session_start();
	
	//takes input and assigns them to variables
	$user = strtolower(trim($_POST['user']));
	$pass = trim($_POST['pass']);
	$email = strtolower(trim($_POST['email']));
	$fname = trim($_POST['fname']);
	$lname = trim($_POST['lname']);
	$stadd = trim($_POST['stadd']);
	$city = trim($_POST['city']);
	$state = $_POST['state'];
	$zip = $_POST['zip'];

	//checks if all required values are input
	if (empty($user) || empty($pass) || empty($email) || empty($fname) || empty($lname) || empty($stadd) || empty($city) || empty($state) || empty($zip)) {
		//redirects to registration page if all values are not input
		$_SESSION['reg_err'] = true;
		header('Location: ../register.php');

		//closes db connection
		$db = null;
		exit();
	}

	//prepares query statement
	$query = $db->prepare("select * from users where username = :user");
	$query->bindParam(':user', $user);

	//gets any elements from db that has matching username values
	$query->execute();
	$result = $query->fetchAll();

	//checks if username input is unique
	if ($result) {
		//redirects to registration page
		$_SESSION['user_taken'] = true;
		header('Location: ../register.php');

		//closes db connection
		$db = null;
		exit();
	}

	//prepares query statement
	$query = $db->prepare("select * from users where email = :email");
	$query->bindParam(':email', $email);

	//gets any elements from db that has matching email values
	$query->execute();
	$result = $query->fetchAll();

	//checks if email input is unique
	if ($result) {
		//redirects to registration page
		$_SESSION['email_taken'] = true;
		header('Location: ../register.php');

		//closes db connection
		$db = null;
		exit();
	}

	//hashes password
	$pass = password_hash($pass, PASSWORD_DEFAULT);

	//concatenates all address inputs
	$address = $stadd.', '.$city.', '.$state.' '.$zip;

	//prepares insert statement
	$query = $db->prepare("insert into users values (:user, :pass, :email, :fname, :lname, :address)");
	$query->bindParam(':user', $user);
	$query->bindParam(':pass', $pass);
	$query->bindParam(':email', $email);
	$query->bindParam(':fname', $fname);
	$query->bindParam(':lname', $lname);
	$query->bindParam(':address', $address);

	//checks if insert was successful
	if ($query->execute()) {
		//redirects to homepage if successful
		$_SESSION['reg_success'] = true;
		$_SESSION['logged_in'] = true;
		header("Location: ../home.php");
	}

	else {
		//redirects to registration page if failed
		$_SESSION['reg_err'] = true;
		header('Location: ../register.php');
	}

	//closes db connection
	$db = null;
	exit();
?>