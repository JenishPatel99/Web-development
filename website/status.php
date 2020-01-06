<?php
	session_start();
	$msgClass = $_SESSION['msgClass'];
	$msg = $_SESSION['msg'];
	
	if (isset($_POST['back'])) {
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<style type="text/css">
		button{
			text-align:center;
		}
	</style>
	<div class="title">
		<h2>Status</h2>
	</div>
	<div class = "container" align="left">
		<?php if($msg != ''): ?>
			<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
		<?php endif; ?>
		<style type="text/css"></style>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<button type = "submit" name = "back" class = "btn btn-primary">back</button>
		</form>
		
	</div>
</body>
</html>