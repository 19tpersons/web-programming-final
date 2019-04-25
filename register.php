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
			<label>Password: <input type="password" name="password" required></label>
			<label>Retype Password: <input type="password" name="password" required></label>
			<label>Birth Year: <input type="number" name="birthYear" value="2000"></label>
			<label>Gender:
				<select name="gender">
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
			</label>
			<input type="submit" value="Submit">
		</form>
	</div>
</body>
</html>