<?php 
	
	if (isset($_POST['gallery_btn'])) {
		
		$caption = $_POST['caption'];
		
		$fileName=$_FILES['img_src']['name'];
		$fileTmpName=$_FILES['img_src']['tmp_name'];
		$fileSize=$_FILES['img_src']['size'];
		$fileError=$_FILES['img_src']['error'];
		$fileType=$_FILES['img_src']['type'];

		$fileExt=explode(".", $fileName);
		$fileActualExt=strtolower(end($fileExt));
		$fileActualName = $fileExt[0];

			if ($fileError===0) {
				$fileNameNew = $fileActualName .'.'. $fileActualExt;
				$fileDestination='../admin/assets/images/gallery/'.$fileNameNew;
				$upload = move_uploaded_file($fileTmpName, $fileDestination);
				if ($upload) {
							// controller classes
					include '../classes/dbh.php';
					include '../classes/gallery.php';
					include '../classes/GalleryContr.php';
					$portfolioObj = new GalleryContr($caption, $fileNameNew);
					$portfolioObj->setNewGallery();
				}else{
					$error = 'Upload Failed, try another image';
					header('location: ../admin/gallery.php?error='.$error);
				}
		}else{
					$error = 'Upload Failed, try another image';
					header('location: ../admin/gallery.php?error='.$error);
				}


		
	}
	