<?php 

	if (isset($_POST['login_btn'])) {
		// form inputs
		$email = $_POST['matNo'];
		$password = $_POST['password'];
		$password = md5($password);

		//controller classes
		include '../classes/dbh.php';
		include '../classes/signin.php';
		include '../classes/signinContr.php';
		$signin = new SigninContr($email, $password);
		$signin->checkUserLogin();

	}