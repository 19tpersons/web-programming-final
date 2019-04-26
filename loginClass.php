<?PHP
/*
	This class with handle the registration and the verification of a user login.
	Author Tyler Persons
	Date 4.25.19
*/

class Login {
	var $host = 'localhost';
	var $db   = 'nicerides';
	var $user = 'root';
	var $pass = '';
	var $charset = 'utf8mb4';
	var $dsn;
	var $options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];	
    var $pdo;

	public function Login() {
		$this->dsn = "mysql:host=". $this->host .";dbname=". $this->db .";charset=". $this->charset;
		$this->pdo = new PDO($this->dsn, $this->user, $this->pass, $this->options); 
	}
	
	//This tries to register the user
	public function registerUser($user, $passwordA, $passwordB, $gender, $birthYear) {
		//Verify format
		if ($passwordA != $passwordB) return false;
		if ($gender == "male") {
			$gender = 1;
		} else if ($gender == "female") {
			$gender = 0;
		} else {
			return false;
		}
		if (!preg_match("/\d{4}/", $birthYear)) return false;
		
		//In php 7.0 the salt is automatically generated otherwise i would use something closer to 64 bytes
		$hash = password_hash($passwordA,  PASSWORD_BCRYPT);
		
		$stmt = $this->pdo->prepare("INSERT INTO user (Gender, BirthYear, username, password) VALUES (:gender, :birthYear, :username, :password)");
		$stmt->execute(["gender" => $gender, "birthYear" => $birthYear, "username" => $user, "password" => $hash]);
		
		return true;
	}
	
	//This tries to verify a user's identity
	public function verify($user, $password) {
		$stmt = $this->pdo->prepare("SELECT password FROM user WHERE username = :user");
		$stmt->execute(["user" => $user]);
		$existingPass = $stmt->fetch();
		
		$match = password_verify($password, $existingPass['password']);
		if ($match === true) {
			return $user;
		} else {
			return false;
		}
	}
}

?>