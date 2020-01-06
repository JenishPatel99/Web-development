<?php
	$msg = '';
	$msgClass = '';
	
	if (filter_has_var(INPUT_POST, 'submit')) {
		session_start();
		$name = htmlentities(trim($_POST['name']));
		$username = htmlentities(trim($_POST['username']));
		$email = htmlentities(filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL));
		$password_new = htmlentities(trim($_POST['password_new']));
		$password_confirm = htmlentities(trim($_POST['password_confirm']));

		$bFaculty = true;
		$bPasswordLength = true;
		$bPasswordMatch = true;
		$bEmail = true;
		$bIsSet = true;

		if(!empty($username) && !empty($email) && !empty($name) && !empty($password_new) && !empty($password_confirm) == true) {
			if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
				$msg = 'Please enter a valid email';
				$msgClass = 'alert-danger';
				$bEmail = false;
			} else if(strlen($password_new) < 8) {
				$msg = 'Password must be 8 or more character long';
				$msgClass = 'alert-danger';
				$bPasswordLength = false;
			} else if($password_new !== $password_confirm) {
				$msg = 'Password does not match. Please try again';
				$msgClass = 'alert-danger';
				$bPasswordMatch = false;
			} else if(isset($_POST['faculty']) && $_POST['faculty'] === 'Choose') {
				$msg = 'Please choose a faculty';
				$msgClass = 'alert-danger';
				$bFaculty = false;
			}
			
			if (($bFaculty && $bPasswordLength && $bPasswordMatch && $bEmail && $bIsSet) == true) {
				header('location: status.php');
			}
		} else {
			$msg = 'Please fill in all blanks';
			$msgClass = 'alert-danger';
			$bIsSet = false;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<div class="title">
		<h2>Create an account</h2>
	</div>
	<div class = "container" align="left">
		<div class="alert-message">
		<?php if($msg != ''): ?>
			<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
		<?php endif; ?>
		</div>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class = "form-group">
				<label for="fname">Name: </label>
				<br>
				<input type="text" name="name" placeholder="Enter name">
 
				<label for="fusername">Username: </label>
				<br>
				<input type="text" name="username" placeholder="Enter username">

				<label for="femail">Email: </label>
				<br>
				<input type="email" name="email" placeholder="Enter email">

				<label for="fpassword_new">Enter password</label>
				<br>
				<input type="password" name="password_new" placeholder="Enter password">

				<label for="fpassword_comfirm">Confirm password</label>
				<br>
				<input type="password" name="password_confirm" placeholder="Re-enter password">

				<label for="faculty">Choose a faculty </label>
				<br>
				<select class='form-control' name="faculty">
					<option>Choose</option>
					<option>Engineering</option>
					<option>Sciences</option>
					<option>Commerce</option>
					<option>Arts</option>
					<option>Other</option>
				</select>

				<br>
				<button type="submit" name="submit" class="btn btn-primary">Create</button>

				<p>Already Registered? <a href="index.php">Log in</a>
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