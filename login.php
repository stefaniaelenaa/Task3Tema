<?php
require('config.php');

if(isset($_SESSION['user_id'])) {
	header('Location: index.php');
}
if(isset($_POST['login-user'])) {
	$error_message = "";
	if(empty($error_message)) {
		// require_once("dbcontroller.php");
		// $db_handle = new DBController();
		$query = "SELECT * FROM registered_users WHERE user_name = '" . $_POST['username'] . "' AND password = '" 
			. md5($_POST['password']) . "';";
		try{
			$result = $db_handle->runQuery($query);
			$user = $result->fetch_assoc();
			if ($user) {
				$_SESSION['user_id'] = $user['id'];
				$_SESSION['curentuser'] = $user['user_name'];
				if (isset($_POST['remember'])) {
					setcookie('remember', $user['id'], 3600, '/');
				}
				unset($_POST);
				header('Location: index.php');
			} else {
				$error_message = "Login failed because bad credentials";	
			}
		}catch (Exception $e) {
			$error_message = "Login failed, cause:" . $e->getMessage();	
		}
		
	}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>Add Product</title>
	<meta charset="iso-8859-1">
	<link rel="stylesheet" href="styles/layout.css" type="text/css">
	<link rel="stylesheet" href="styles/jquery.bxslider.css" type="text/css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="scripts/jquery.bxslider.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>

<body>
	<div class="wrapper row1">
		<header id="header" class="clear">
		<div id="hgroup">
			<h1><a href="#">Roweb</a></h1>
		</div>
		</header>
	</div>
	
	<!-- content -->
	<div class="wrapper row2">
	<div id="container" class="clear">
    <!-- content body -->
	<div class="container">
	<form action="" method="post">
		<h1>Login</h1>
		<?php if(isset($error_message) and !empty($error_message)) { ?>	
			<div class="error-message">
				<?php echo $error_message; ?>
			</div>
		<?php } ?> 
		<fieldset>
			<label for="username"> Username:</label>
			<input type="text" id="username" name="username" required>

			<label for="password"> Password:</label>
			<input type="password" id="password" name="password" required>
		</fieldset>
		<input type="checkbox" name="remember" value="1" />Remember me
		<button type="submit" name="login-user">Login</button>
	</form>
	</div><!-- content body -->
	</div>
	<!-- footer -->
	<div class="wrapper row3">
		<footer id="footer" class="clear">
			<p class="fl_left">Copyright &copy; - All Rights Reserved - <a href="www.roweb.ro">Roweb Homepage</a></p>
			<p class="fl_right"> Roweb</p>
		</footer>
	</div>
	<!-- footer -->
	</div><!-- content -->
<script>
$(function(){
  
});
</script>

</body>
</html>
