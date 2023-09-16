<?php 
	
	if (isset($_POST['member_btn'])) {
		
		$surname = $_POST['surname'];
		$matNo = $_POST['matNo'];
		$dob = $_POST['dob'];
		$grad_yr = $_POST['grad_yr'];
		// controller classes
		include '../classes/dbh.php';
		include '../classes/members.php';
		include '../classes/MembersContr.php';
		$contact = new MembersContr($surname, $matNo, $dob, $grad_yr);
		$contact->setNewMember();
		
	}
	