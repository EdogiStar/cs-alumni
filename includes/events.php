<?php 
	
	if (isset($_POST['event_btn'])) {
		
		$event_title = $_POST['event_title'];
		$event_date = $_POST['event_date'];
		$event_venue = $_POST['event_venue'];
		$event_desc = $_POST['event_desc'];
		
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
			$fileDestination='../admin/assets/images/event/'.$fileNameNew;
			$upload = move_uploaded_file($fileTmpName, $fileDestination);
			if ($upload) {
				// controller classes
				include '../classes/dbh.php';
				include '../classes/events.php';
				include '../classes/EventsContr.php';
				$contact = new EventsContr($event_title, $event_date, $event_venue, $fileNameNew, $event_desc);
				$contact->setNewEvent();
			}else{
				$error = 'Upload Failed, try another image';
				header('location: ../admin/events.php?error='.$error);
			}
		}else{
				$error = 'There was an error with the photo, try another';
				header('location: ../admin/events.php?error='.$error);
			}
	}
	