<?php 
	if (isset($_GET['del_gallery'])) {
		$del_gallery = $_GET['del_gallery'];
		$del_gallery = explode(",", $del_gallery);
		$token = $del_gallery[0];
		$caption = $del_gallery[1];
		$img_src = $del_gallery[2];
		
		// controller classes
		include '../classes/dbh.php';
		include '../classes/gallery.php';
		include '../classes/GalleryContr.php';
		$portfolioObj = new GalleryContr($caption, $img_src);

		$portfolioObj->deleteGallery($token);
	}
?>

