<?php 

	/**
	 * 
	 */
	class EventsContr extends Events
	{
		private $event_title;
		private $event_date;
		private $event_venue;
		private $event_img;
		private $event_desc;
		
		public function __construct($event_title, $event_date, $event_venue, $event_img, $event_desc)
		{
			$this->event_title = $event_title;
			$this->event_date = $event_date;
			$this->event_venue = $event_venue;
			$this->event_img = $event_img;
			$this->event_desc = $event_desc;
		}


		public function updateEvent($token) {

			$result = $this->updateEventById($this->event_title, $this->event_date, $this->event_venue, $this->event_img, $this->event_desc, $token);
			if ($result == true) {
				$success = 'Updated Successfully';
				header('location: ../admin/events.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/events.php?error='.$error);
				exit();
			}
		}

		public function showEventRecord($token) {
			$result = $this->showEventById($token);
			return $result;
		}

		public function setNewEvent() {

			if ($this->emptyInputs() == false) {
				$error = 'All fields are required';
				header('location: ../admin/events.php?error='.$error);
				exit();
			}

			if ($this->checkEvent($this->event_title, $this->event_date, $this->event_venue, $this->event_img, $this->event_desc) == false) {
				$error = 'Event Exists';
				header('location: ../admin/events.php?error='.$error);
				exit();	
			}

			// no errors
			$result = $this->setEvent($this->event_title, $this->event_date, $this->event_venue, $this->event_img, $this->event_desc);
			if ($result == true) {
				$success = 'Added Successfully';
				header('location: ../admin/events.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/events.php?error='.$error);
				exit();
			}
		}

		public function deleteEvent($token) {
			$result = $this->deleteEventById($token);
			if ($result == true) {
				$success = 'Deleted Successfully';
				header('location: ../admin/events.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/events.php?error='.$error);
				exit();
			}
		}

		private function emptyInputs() {
			$result;
			if(empty($this->event_title) || empty($this->event_date) || empty($this->event_venue) || empty($this->event_desc) || empty($this->event_img)){
				$result = false; 
			}else{
				$result = true;
			}
			return $result;
		}
		
	}