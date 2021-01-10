<?php
	//include session info
	session_start();

	//deletes session info
	session_unset();
	session_destroy();

	//redirects user to log in page
	header('Location: ../../index.php');
?>