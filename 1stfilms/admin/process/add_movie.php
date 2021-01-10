<?php
	//includes db connection
	require_once '../../db_connect.php';

	//includes session info
	session_start();
	
	//takes input and assigns them to variables
	$year = trim($_POST['year']);
	$title = trim($_POST['title']);
	$rating = trim($_POST['rating']);
	$genre = trim($_POST['genre']);
	$summary = trim($_POST['summary']);
	$writer = trim($_POST['writer']);
	$director = trim($_POST['director']);
	$starring = trim($_POST['starring']);
	$image = trim($_POST['image']);
	$video = trim($_POST['video']);

	//checks if all required values are input
	if (empty($year) || empty($title) || empty($rating) || empty($genre) || empty($summary) || empty($writer) || empty($director) || empty($starring) || empty($image) || empty($video)) {
		//redirects to registration page if all values are not input
		$_SESSION['add_err'] = true;
		header('Location: ../new_movie.php');

		//closes db connection
		$db = null;
		exit();
	}

	//prepares query statement
	$query = $db->prepare("select * from movies where title = :title");
	$query->bindParam(':title', $title);

	//gets any elements from db that has matching username values
	$query->execute();
	$result = $query->fetchAll();

	//checks if username input is unique
	if ($result) {
		//redirects to registration page
		$_SESSION['title_taken'] = true;
		header('Location: ../new_movie.php');

		//closes db connection
		$db = null;
		exit();
	}

	//prepares query statement
	$query = $db->prepare("select * from movies where year = :year ordered by year");
	$query->bindParam(':year', $year);

	//gets any elements from db that has matching email values
	$query->execute();
	$result = $query->fetchAll();

	//checks if email input is unique
	if ($result) {
		//redirects to registration page
		$_SESSION['year_taken'] = true;
		header('Location: ../new_movie.php');

		//closes db connection
		$db = null;
		exit();
	}

	//prepares insert statement
	$query = $db->prepare("insert into movies values (:year, :title, :rating, :genre, :summary, :writer, :director, :starring, :image, :video)");
	$query->bindParam(':year', $year);
	$query->bindParam(':title', $title);
	$query->bindParam(':rating', $rating);
	$query->bindParam(':genre', $genre);
	$query->bindParam(':summary', $summary);
	$query->bindParam(':writer', $writer);
	$query->bindParam(':director', $director);
	$query->bindParam(':starring', $starring);
	$query->bindParam(':image', $image);
	$query->bindParam(':video', $video);

	//checks if insert was successful
	if ($query->execute()) {
		//redirects to homepage if successful
		$_SESSION['add_success'] = true;
		header("Location: ../new_movie.php");
	}

	else {
		//redirects to registration page if failed
		$_SESSION['add_err'] = true;
		header('Location: ../new_movie.php');
	}

	//closes db connection
	$db = null;
	exit();
?>