<?PHP
require_once("header.php");
require_once("loginClass.php");
	
if (isset($_POST['username'])) {
	$login = new Login();
	$register = $login->registerUser($_POST['username'], $_POST['password1'], $_POST['password2'], $_POST['gender'], $_POST['birthYear']);
	
	//Was the registration successful
	if ($register) {
		header("Location: login.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>NiceRide Register</title>
	
</head>

<body>
	<div id="container">
		<form action="" method="POST" id="registerForm">
			<label>Username: <input type="text" name="username" required></label>
			<label>Password: <input type="password" name="password1" required></label>
			<label>Retype Password: <input type="password" name="password2" required></label>
			<label>Birth Year: <input type="number" name="birthYear" value="2000"></label>
			<label>Gender:
				<select name="gender" required>
					<option></option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
			</label>
			<input type="submit" value="Submit">
		</form>
	</div>
</body>
</html>