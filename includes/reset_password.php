<?php 
	
	if (isset($_POST['reset_btn'])) {
		
		$new_password = $_POST['password'];
		$password_confirm = $_POST['password_confirm'];
		$token = $_POST['token'];
		$token = explode(',', $token);
		$user_id = $token[0];
		$email = $token[1];
		$password = null;
		// controller classes
		include '../classes/dbh.php';
		include '../classes/signin.php';
		include '../classes/signinContr.php';
		$resetObj = new SigninContr($email, $password);
		$resetObj->resetPassword($user_id, $new_password, $password_confirm);
		
	}
	