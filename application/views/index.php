<!DOCTYPE html>
<html lang="en">
<head>
	<title>Book Reviews | Login & Reg</title>
	<meta charset="UTF-8">
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src=""></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main.css') ?>">

</head>
<body>
	<div id="register-login-container">
		<h2>Welcome!</h2>
				<div id="register-wrapper">
					<form class="form-group" action="Users/register" method="post">
						<fieldset>
							<legend>Register</legend>
							<label for="">Full Name: <input name="name" type="text" class="form-control"></label>
							<label for="">Alias: <input name="alias" type="text" class="form-control"></label>
							<label for="">Email: <input name="register_email" type="text" class="form-control"></label>
							<label for="">Password: <input name="register_password" type="password" class="form-control"></label>
							<p>*Password should be at least 8 characters</p>
							<label for="">Confirm Password: <input name="confirm_pass" type="password" class="form-control"></label>

							<label>Date of Birth: <input name="dob" type="date" class="form-control"></label>

							<div class='clr'></div>
					  		<input type="submit" class="btn btn-default" value="Register" id="submit-button">
					  		<div class='clr'></div>
						</fieldset>
					</form>
				</div>	

				<div id="login-wrapper">
					<form class="form-group" action="Users/login" method="post">
						<fieldset>
							<legend>Login</legend>
							<label for="">Email: <input name="login_email" type="text" class="form-control"></label>
							<label for="">Password: <input name="login_password" type="password" class="form-control"></label>

							<div class='clr'></div>
					  		<input type="submit" class="btn btn-default" value="Login" id="submit-button">
							<div class='clr'></div>
					  		
						</fieldset>
					</form>	
				</div>
				
			<span class="success-login-message">
				<?=	$register_message ?>
			</span>
			<span class="error-login-message">
				<?= $errors ?>
			</span>	
	</div>
</body>
</html>