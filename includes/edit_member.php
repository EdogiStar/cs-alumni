<?php 
	
	if (isset($_POST['new_member_btn'])) {
		
		$edit_surname = $_POST['edit_surname'];
		$edit_MatNo = $_POST['edit_MatNo'];
		$edit_dob = $_POST['edit_dob'];
		$edit_grad_yr = $_POST['edit_grad_yr'];
		$token = $_POST['token'];
		$token = md5($token);
		
		// controller classes
		include '../classes/dbh.php';
		include '../classes/members.php';
		include '../classes/membersContr.php';
		$contact = new MembersContr($edit_surname, $edit_MatNo, $edit_dob, $edit_grad_yr);
		$contact->updateMember($token);
		
	}
	