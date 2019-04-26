<?PHP
	//This should be imported into every webpage.

	//Is a session already going?
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}

	//Is the user logged in?
	if (!$_SESSION['status'] && ) {
		header("Location: login.php");
	} 
?>