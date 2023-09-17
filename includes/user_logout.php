<?php
	session_start();

	if (isset($_SESSION['userID'])) {
		
		session_destroy();
		unset($_SESSION['userID']);
		header("location: ../index.php");
	}

?>