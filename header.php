<?PHP 
	if (!$_SESSION['status']) {
		header("Location: login.php");
	}
?>