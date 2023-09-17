<?php 
	
	if (isset($_POST['register_btn'])) {
		
		$surname = $_POST['surname'];
		$matNo = $_POST['matNo'];
		$dob = $_POST['dob'];
		$grad_yr = '';

		$token = $_POST['token'];
		$firstname = $_POST['firstname'];
		$othername = $_POST['othername'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$password = md5($password);
		$token = md5($token);
		// controller classes
		include '../classes/dbh.php';
		include '../classes/members.php';
		include '../classes/MembersContr.php';
		$contact = new MembersContr($surname, $matNo, $dob, $grad_yr);
		$contact->completeReg($firstname, $othername, $email, $phone, $password, $token);
		
	}
	