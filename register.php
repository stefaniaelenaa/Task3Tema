<?php
require('config.php');

if(isset($_SESSION['user_id'])) {
	header('Location: index.php');
}
if(isset($_POST['register-user'])) {
	$error_message = "";

	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
			$error_message = "All Fields are required";
			break;
		}
	}
	
	/* Password Matching Validation */
	if(empty($error_message) and $_POST['password'] != $_POST['repeat_password']){ 
		$error_message = 'Passwords should be same'; 
	}

	/* Email Validation */
	if(empty($error_message) and !filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
		$error_message = "Invalid Email Address";
	}
	
	/* Validation to check if Terms and Conditions are accepted */
	if(empty($error_message) and !isset($_POST["terms"])) {
		$error_message = "Accept Terms and Conditions to Register";
	}

	if(empty($error_message)) {
		// require_once("dbcontroller.php");
		// $db_handle = new DBController();
		$query = "INSERT INTO registered_users (name, email, user_name, password) VALUES ('"
			. $_POST["name"] . "', '" . $_POST["userEmail"] . "', '" . $_POST["userName"] . "', '" . md5($_POST["password"]) . "')";
		try{
			$result = $db_handle->insertQuery($query);
			if(!empty($result)) {
				$error_message = "";
				unset($_POST);
				header('Location: index.php?register=true');
			} else {
				$error_message = "Problem in registration. Try Again!";	
			}
		}catch (Exception $e) {
			$error_message = "Query problem :" . $e->getMessage();	
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
	<form method="post" action="">
        <h1>Register</h1>
		<?php if(isset($error_message) and !empty($error_message)) { ?>	
			<div class="error-message">
				<?php echo $error_message; ?>
			</div>
		<?php } ?> 
        <fieldset>
			<label for="name">Name:</label>
			<input type="text" name="name" value="<?php if(isset($_POST['name'])) {echo $_POST['name'];}?>">
			<br>
			<label for="userEmail">Email:</label>
			<input type="email" name="userEmail" autocomplete="off" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>">
			<br>
			<label for="userName">Usename:</label>
			<input type="text" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>">
			<br>
			<label for="password">Password:</label>
			<input type="password" name="password">
			<br>
			<label for="repeat_password">Repeat password:</label>
			<input type="password" name="repeat_password">
			<br>
			<input type="checkbox" name="terms"> I accept Terms and Conditions 
			<br>
			<br>
			<button type="submit" name="register-user" value = "Register">Register</button>
        </fieldset>
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
