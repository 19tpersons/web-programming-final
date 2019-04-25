/*
	This class with handle the registration and the verification of a user login.
	Author Tyler Persons
	Date 4.25.19
*/

class Login {
	private var $host = 'localhost';
	private var $db   = 'nicerides';
	private var $user = 'root';
	private var $pass = '';
	private var $charset = 'utf8mb4';
	private var $dsn = "mysql:host=". $this->host .";dbname=". $this->db .";charset=". $this->charset;
	private var $options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];	
    private var $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->options);

	public Login() {
		
	}
	
	public registerUser($user, $password1, $password2, $gender, $birthYear) {
		if ($password1 != $password2) die("The passwords are not the same.");
		$salt = random_bytes(32);
		
	}
	
	public verify($user, $password) {
		
	}
}