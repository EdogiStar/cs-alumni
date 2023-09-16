<?php 
	
	if (isset($_POST['update_profile'])) {
		
		$token = $_POST['token'];
		$fileName=$_FILES['edit_img_src']['name'];
		$fileTmpName=$_FILES['edit_img_src']['tmp_name'];
		$fileSize=$_FILES['edit_img_src']['size'];
		$fileError=$_FILES['edit_img_src']['error'];
		$fileType=$_FILES['edit_img_src']['type'];
		$img_alt = 'null';
		//SET FILE IMAGE TO 900 X 650

		$fileExt=explode(".", $fileName);
		$fileActualExt=strtolower(end($fileExt));
		$fileActualName = $fileExt[0];

			if ($fileError===0) {
				$fileNameNew = $fileActualName .'.'. $fileActualExt;
				$fileDestination='../assets/img/'.$fileNameNew;
				$upload = move_uploaded_file($fileTmpName, $fileDestination);
				if ($upload) {
							// controller classes
					include '../classes/dbh.php';
					include '../classes/profilephoto.php';
					include '../classes/profilephotoContr.php';
					$portfolioObj = new ProfilePhotoContr($fileNameNew, $img_alt);
					$portfolioObj->setNewProfilePhoto($token);
				}else{
					$error = 'Upload Failed, try another image';
					header('location: ../admin/portfolio.php?error='.$error);
				}
		}else{
					$error = 'Upload Failed, try another image';
					header('location: ../admin/portfolio.php?error='.$error);
				}


		
	}
	