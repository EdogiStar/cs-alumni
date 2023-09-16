<?php 
	if (isset($_GET['del_event'])) {
		$del_event = $_GET['del_event'];
	      $del_event = explode(",", $del_event);
	      $token = $del_event[0];
	      $event_title = $del_event[1];
	      $event_date = $del_event[2];
	      $event_venue = $del_event[3];
	      $event_img = $del_event[4];
	      $event_desc = $del_event[5];

		// controller classes
		include '../classes/dbh.php';
		include '../classes/events.php';
		include '../classes/EventsContr.php';
		
		$contact = new EventsContr($event_title, $event_date, $event_venue, $event_img, $event_desc);

		$contact->deleteEvent($token);
	}
?>

