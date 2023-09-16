<?php 
	
	if (isset($_POST['new_skill_btn'])) {
		
		$icon = $_POST['icon'];
		$href = $_POST['href'];

		
		// controller classes
		include '../classes/dbh.php';
		include '../classes/socialLinks.php';
		include '../classes/socialLinksContr.php';
		$contact = new SocialLinksContr($href, $icon);

		$contact->setNewLink();
		
	}
	