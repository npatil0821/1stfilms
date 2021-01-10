<?php
	//include db connection
	require_once '../../db_connect.php';

	//includes session info
	session_start();

	//takes input and assigns it to varible
	$year = $_POST['year'];

	//prepares statement
	$query = $db->prepare('delete from movies where year = :year');
	$query->bindParam(':year', $year);

	//checks if delete with successful
	if ($query->execute())
		$_SESSION['del_success'] = true;

	else
		$_SESSION['del_fail'] = true;

	//redirects to manage movies page
	header('Location: ../manage_users.php');

	//closes db connection
	$db = null;
	exit();
?>