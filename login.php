<?PHP
	require_once("loginClass.php");
	
	//Is a session already going?
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	
	if (!empty($_POST['username'])) {
		$login = new Login();
		$match = $login->verify($_POST['username'], $_POST['password']);
		if ($match) {
			$_SESSION['status'] = $match;
			print '<script>alert("GOOD! '.  $match .'");</script>';
			//We can add a redirect here ... header("Location: index.php");
		}	
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>NiceRide Login</title>
	
</head>

<body>
	<div id="container">
		<form id="login" action="" method="POST">
			<label>Username: <input type="text" name="username" required></label>
			<label>Password: <input type="password" name="password" required></label>
			<input type="submit" value="Submit">
		</form>
	</div>
</body>
</head>