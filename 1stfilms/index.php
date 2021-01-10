<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>1st Films</title>

		<!--includes stylesheet for bootstrap-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<style>
			/*sets size of hero image to 600px*/
			img {max-width: 600px;}
		</style>
	</head>

	<!--sets background color to dark gray, text align to center, and text color in body to white-->
	<body class='bg-dark text-center text-white'>

			<!--thickens font weight of title and changes color to red-->
			<h1 class='text-monospace display-2 text-danger font-weight-normal'>1st Films</h1>

			<!--makes subtitle stand out and changes color to gray-->
			<h2 class='text-monospace lead text-white-50'>The world's best films all in one place.</h2>
			<br>

			<!--rounds image corners-->
			<img class='rounded' src='theater.jpg' alt='theater'>
			<br><br>
			<!--creates two transparent red link buttons. centers and adds spacing between them-->
			<div class='container'>
				<div class='row justify-content-center'>
					<!--links to login page-->
					<a href='login.php' class='text-monospace btn btn-large btn-danger col-2' role='button'>Log In</a>

					<!--links to registration page-->
					<a href='register.php' class='text-monospace btn btn-large btn-danger col-2 offset-2' role='button'>Register</a>
				</div>
			</div>

		<!--includes bootstrap js scripts-->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	</body>
</html>