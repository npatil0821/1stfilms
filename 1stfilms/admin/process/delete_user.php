<?php
	//include db connection
	require_once '../../db_connect.php';

	//includes session info
	session_start();

	//takes input and assigns it to variable
	$user = $_POST['user'];

	//prepares statement
	$query = $db->prepare('delete from users where username = :user');
	$query->bindParam(':user', $user);

	//checks if delete with successful
	if ($query->execute())
		$_SESSION['del_success'] = true;

	else
		$_SESSION['del_fail'] = true;

	//redirects to manage users page
	header('Location: ../manage_users.php');

	//closes db connection
	$db = null;
	exit();
?>