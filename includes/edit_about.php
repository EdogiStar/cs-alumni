<?php 
	
	if (isset($_POST['new_about_btn'])) {
		
		$content1 = $_POST['new_content1'];
		$content2 = $_POST['new_content2'];
		$token = $_POST['token'];
		
		// controller classes
		include '../classes/dbh.php';
		include '../classes/about.php';
		include '../classes/aboutContr.php';
		$aboutObj = new AboutContr($content1, $content2);
		$aboutObj->updateAbout($token);
		
	}
	