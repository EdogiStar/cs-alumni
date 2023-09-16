<?php 
	
	if (isset($_POST['news_btn'])) {
		
		$news_title = $_POST['news_title'];
		$news_date = $_POST['news_date'];
		$news_desc = $_POST['news_desc'];
		
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
			$fileDestination='../admin/assets/images/news/'.$fileNameNew;
			$upload = move_uploaded_file($fileTmpName, $fileDestination);
			if ($upload) {
				// controller classes
				include '../classes/dbh.php';
				include '../classes/news.php';
				include '../classes/NewsContr.php';
				$contact = new NewsContr($news_title, $news_date, $fileNameNew, $news_desc);
				$contact->setNewNews();
			}else{
				$error = 'Upload Failed, try another image';
				header('location: ../admin/news.php?error='.$error);
			}
		}else{
				$error = 'There was an error with the photo, try another';
				header('location: ../admin/news.php?error='.$error);
			}
	}
	