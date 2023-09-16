<?php 
	if (isset($_GET['del_member'])) {
		$del_member = $_GET['del_member'];
		$del_member = explode(",", $del_member);
		$token = $del_member[0];
		$surname = $del_member[1];
		$matNo = $del_member[2];
		$dob = $del_member[3];
		$grad_yr = $del_member[4];

		// controller classes
		include '../classes/dbh.php';
		include '../classes/members.php';
		include '../classes/membersContr.php';
		$contact = new MembersContr($surname, $matNo, $dob, $grad_yr);

		$contact->deleteMember($token);
	}
?>

