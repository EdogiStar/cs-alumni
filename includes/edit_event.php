<?php 

	if (isset($_POST['new_event_btn'])) {
		$new_event_title = $_POST['new_event_title'];
		$new_event_date = $_POST['new_event_date'];
		$new_event_venue = $_POST['new_event_venue'];
		$new_event_desc = $_POST['new_event_desc'];
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
			$fileDestination='../admin/assets/images/event/'.$fileNameNew;
			$upload = move_uploaded_file($fileTmpName, $fileDestination);
			if ($upload) {
				// controller classes
				include '../classes/dbh.php';
				include '../classes/events.php';
				include '../classes/EventsContr.php';
				$contact = new EventsContr($new_event_title, $new_event_date, $new_event_venue, $fileNameNew, $new_event_desc);
				$contact->updateEvent($token);
			}else{
				$error = 'Upload Failed, try another image';
				header('location: ../admin/events.php?error='.$error);
			}
		}else{
				$error = 'There was an error with the photo, try another';
				header('location: ../admin/events.php?error='.$error);
			}
	}
	