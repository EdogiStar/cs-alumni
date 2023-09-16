<?php 
	if (isset($_GET['del_link'])) {
		$del_link = $_GET['del_link'];
		$del_link = explode(",", $del_link);
		$token = $del_link[0];
		$href = $del_link[1];
		$icon = $del_link[2];

		// controller classes
		include '../classes/dbh.php';
		include '../classes/socialLinks.php';
		include '../classes/socialLinksContr.php';
		$contact = new SocialLinksContr($href, $icon);

		$contact->deleteLink($token);
	}
?>

