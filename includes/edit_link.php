<?php 
	
	if (isset($_POST['new_link_btn'])) {
		
		$new_link_name = $_POST['new_link_name'];
		$new_link_icon = $_POST['new_link_icon'];
		$token = $_POST['token'];
		$token = md5($token);
		
		// controller classes
		include '../classes/dbh.php';
		include '../classes/socialLinks.php';
		include '../classes/socialLinksContr.php';
		$contact = new SocialLinksContr($new_link_name, $new_link_icon);

		$contact->updateLink($token);
		
	}
	