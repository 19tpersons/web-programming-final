<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>NiceRide Project</title>
	
	<?PHP
	/* 
		$host = 'localhost';
		$db   = 'test';
		$user = 'root';
		$pass = '';
		$charset = 'utf8mb4';
		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$options = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		$pdo = new PDO($dsn, $user, $pass, $options);
	
		if (!empty($_POST['entryType']) {
			//Insert informtion into the database
			$type = $_POST['entryType'];
			
			if ($type == "user") {
				$stmt = $pdo->prepare("INSERT INTO user (Gender, UserType, BirthYear) VALUES (:gender :usertype, :birthyear)");
				$stmt->execute(["gender" => $gender, "usertype" => $usertype, "birthyear" => $birthyear]);
			} else if ($type == "trip") {
				$stmt = $pdo->prepare("INSERT INTO user (Gender, UserType, BirthYear) VALUES (:gender :usertype, :birthyear)");
				$stmt->execute(["gender" => $gender, "usertype" => $usertype, "birthyear" => $birthyear]);
			}
		} else if (!empty($_POST['selectType'])) {
			//Get information from database
		}
		*/
	?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> 
	<script>
		
	</script>
</head>

<body>
	<h2>Add an Entry into the Database</h2>
	<form action="" method="POST"> 
		<label>User Type: <input type="text" name="userType"></label>
		<label>Gender: <select name="gender"><option value="M">Male</option><option value="F">Female</option></select></label>
		<label>Birth Year: <input type="number" name="birthYear" min="1900" max="2020" value="2000"></label>
		<input type="text" name="entryType" style="display: none"; value="user">
		<input type="submit" value="Submit">
	</form>
	
	<form action="" method="POST"> 
		<label>Start Station ID: <input type="number" name="startStation"></label>
		<label>End Station ID: <input type="number" name="endStation"></label>
		<label>Start Time: <input type="time" name="startTime"></label>
		<label>End Time: <input type="time" name="endTime"></label>
		<label>Bike ID: <input type="number" name="bikeID"></label>
		<label>User ID: <input type="number" name="userID"></label>
		<input type="text" name="entryType" style="display: none"; value="trip">
		<input type="submit" value="Submit">
	</form>
	
	<h2>Get Information from the database</h2>
	<form action="" method="POST">
		<label>Get Data
			<select name="selectType">
				<option value="userInfo">Basic User Information</option>
				<option value="tripInfo">Basic Trip Information</option>
				<option value="stationInfo">Basic Station Information</option>
			</select>
		</label>
		<input type="submit" value="Submit">
	</form>
</body>
</html>