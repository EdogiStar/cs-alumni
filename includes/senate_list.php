<?php 
	
	if (isset($_POST['check_senate_btn'])) {
		
		$surname = $_POST['surname'];
		$matNo = $_POST['matNo'];
		$dob = $_POST['dob'];
		$grad_yr = null;

		// controller classes
		include '../classes/dbh.php';
		include '../classes/members.php';
		include '../classes/membersContr.php';
		$contact = new MembersContr($surname, $matNo, $dob, $grad_yr);

		$contact->checkSenateList();
		
	}
	