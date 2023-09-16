<?php 
	
	if (isset($_POST['submit'])) {
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['subject'];
		$message = $_POST['message'];
		
		// controller classes
		include '../classes/dbh.php';
		include '../classes/contact.php';
		include '../classes/contactContr.php';
		$contact = new ContactContr($name, $email, $phone, $message);

		$contact->createContact();
		
	}
	