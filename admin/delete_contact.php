<?php 
	if (isset($_GET['del_contact'])) {
		$del_contact = $_GET['del_contact'];
		$del_contact = explode(",", $del_contact);
		$token = $del_contact[0];
		$name = $del_contact[1];
		$email = $del_contact[2];
		$phone = $del_contact[3];
		$message = $del_contact[4];

		// controller classes
		include '../classes/dbh.php';
		include '../classes/contact.php';
		include '../classes/contactContr.php';
		$contact = new ContactContr($name, $email, $phone, $message);

		$contact->deleteContact($token);
	}
?>

