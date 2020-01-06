<?php
	$msg = '';
	$msgClass = '';
	
	if (filter_has_var(INPUT_POST, 'submit')) {
		session_start();
		$username = $_POST['username'];
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		echo $email;

		if(!empty($username) && !empty($email)) {
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				$msg = 'Please enter a valid email';
				$msgClass = 'alert-danger';
			} else {
				$_SESSION['msg'] = 'Success';
				$_SESSION['msgClass'] = 'alert-success';
				header('location: status.php');
			}
		} else {
			$msg = 'Please fill in all blanks';
			$msgClass = 'alert-danger';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<div class="title">
		<h2>Welcome to my Website</h2>
	</div>
	<div class = "container" align="left">
		<div class="alert-message">
		<?php if($msg != ''): ?>
			<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
		<?php endif; ?>
		</div>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class = "form-group"> 
				<label for="fname">Username: </label>
				<br>
				<input type="text" name="username" placeholder="Enter username">

				<label for="fpassword">Password: </label>
				<br>
				<input type="password" name="password" placeholder="Enter password">
			 	
				<br>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>

				<p>Not Registered? <a href="sign_up.php">Create an account</a></p>
				<style type="text/css">
					p{
						text-align:center;
						margin-top: 10px;
					}
				</style>
			</div>
		</form>
	</div>
</body>
</html>