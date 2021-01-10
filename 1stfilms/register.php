<?php
	//includes session info
	session_start();

	$notice = '';

	//notifies the user if the username is already taken
	if (isset($_SESSION['user_taken']) && $_SESSION['user_taken'] == true) {
		$notice = 'Username is already taken.';

		unset($_SESSION['user_taken']);
	}

	//notifies the user if the email is already in use
	else if (isset($_SESSION['email_taken']) && $_SESSION['email_taken'] == true) {
		$notice = 'Email address is already in use.';

		unset($_SESSION['email_taken']);
	}

	//notifies the user if an error occurred while creating an account
	else if (isset($_SESSION['reg_err']) && $_SESSION['reg_err'] == true) {
		$notice = 'An error has occurred. Please try again.';

		unset($_SESSION['reg_err']);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Register</title>

		<!--includes stylesheet for bootstrap-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>

	<!--sets background color to dark gray, text align to center, and text color in body to white-->
	<body class='bg-dark text-center text-white'>
		<!--thickens font weight of title and changes color to red-->
		<h1 class='display-4 text-danger font-weight-normal'>1st Films</h1>
		<br>

		<!--title for page register page-->
		<h1 class='lead text-monospace text-white-50'>Register</h1>

		<!--outputs notification for user-->
		<p class='text-danger text-monospace'><?php echo $notice; ?></p>
		<br>

		<!--registration form is passed to # through post-->
		<form action='process/reg_process.php' method='post'>
			<div class='container text-monospace form-group'>
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

				<!--takes email-->
				<br>
				<div class='row justify-content-center'>
					<label for='email' class='col-md-2'>Email:</label>
					<input type='email' class='col-md-2 form-control' name='email' placeholder='email@domain.com' required>
				</div>

				<!--takes first name-->
				<br>
				<div class='row justify-content-center'>
					<label for='fname' class='col-md-2'>First Name:</label>
					<input type='text' class='col-md-2 form-control' name='fname' required>
				</div>

				<!--takes last name-->
				<br>
				<div class='row justify-content-center'>
					<label for='lname' class='col-md-2'>Last Name:</label>
					<input type='text' class='col-md-2 form-control' name='lname' required>
				</div>

				<!--takes street address-->
				<br>
				<div class='row justify-content-center'>
					<label for='stadd' class='col-md-2'>Street Address:</label>
					<input type='text' class='col-md-2 form-control' name='stadd' required>
				</div>

				<!--takes city-->
				<br>
				<div class='row justify-content-center'>
					<label for='city' class='col-md-2'>City:</label>
					<input type='text' class='col-md-2 form-control' name='city' required>
				</div>

				<!--takes state-->
				<br>
				<div class='row justify-content-center'>
					<label for='state' class='col-md-2'>State:</label>

					<!--code for dropdown menu modified from https://gist.github.com/pusherman/3145761-->
                    <select id='state' name='state' class='col-md-2 form-control' required>
                    	<option value=''>Select A State</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>    
				</div>

				<!--takes zip code-->
				<br>
				<div class='row justify-content-center'>
					<label for='zip' class='col-md-2'>Zip Code:</label>
					<input type='text' class='col-md-2 form-control' name='zip' pattern='[0-9]{5}' title='5-digit area code' required>
				</div>

				<!--button to submit form information-->
				<br>
				<input type='submit' class='text-monospace btn btn-large btn-danger col-md-2' value='Submit'>
			</div>
		</form>

		<!--link to redirect to login page-->
		<br>
		<div class='container'>
			<div class='row justify-content-center'>
				<p class='col-md text-monospace'>Already have an account? <a class ='text-danger' href='login.php'>Log in!</a></p>
			</div>
		</div>

		<!--includes bootstrap js scripts-->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	</body>
</html>