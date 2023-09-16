<?php 
	
	if (isset($_POST['new_gallery_btn'])) {
		
		$caption = $_POST['edit_caption'];
		$token = $_POST['token'];
		$token = md5($token);

		$fileName=$_FILES['edit_img_src']['name'];
		$fileTmpName=$_FILES['edit_img_src']['tmp_name'];
		$fileSize=$_FILES['edit_img_src']['size'];
		$fileError=$_FILES['edit_img_src']['error'];
		$fileType=$_FILES['edit_img_src']['type'];


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
				$portfolioObj->updateGallery($token);
			}else{
				$error = 'Upload Failed, try another image';
				header('location: ../admin/gallery.php?error='.$error);
			}
		}else{
				$error = 'Upload Failed, try another image';
				header('location: ../admin/gallery.php?error='.$error);				
			}
		
	}
	