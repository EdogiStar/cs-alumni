<?php 
	
	if (isset($_POST['new_news_btn'])) {
		$new_news_title = $_POST['new_news_title'];
		$new_news_date = $_POST['new_news_date'];
		$new_news_desc = $_POST['new_news_desc'];
		$token = $_POST['token'];
		$token = md5($token);
		
		$fileName=$_FILES['new_img_src']['name'];
		$fileTmpName=$_FILES['new_img_src']['tmp_name'];
		$fileSize=$_FILES['new_img_src']['size'];
		$fileError=$_FILES['new_img_src']['error'];
		$fileType=$_FILES['new_img_src']['type'];

		$fileExt=explode(".", $fileName);
		$fileActualExt=strtolower(end($fileExt));
		$fileActualName = $fileExt[0];

		if ($fileError===0) {
			$fileNameNew = $fileActualName .'.'. $fileActualExt;
			$fileDestination='../admin/assets/images/news/'.$fileNameNew;
			$upload = move_uploaded_file($fileTmpName, $fileDestination);
			if ($upload) {
				// controller classes
				include '../classes/dbh.php';
				include '../classes/news.php';
				include '../classes/NewsContr.php';
				$contact = new NewsContr($new_news_title, $new_news_date, $fileNameNew, $new_news_desc);
				$contact->updateNews($token);
			}else{
				$error = 'Upload Failed, try another image';
				header('location: ../admin/news.php?error='.$error);
			}
		}else{
				$error = 'There was an error with the photo, try another';
				header('location: ../admin/news.php?error='.$error);
			}
	}
	