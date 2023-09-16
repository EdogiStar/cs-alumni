<?php 

	/**
	 * 
	 */
	class Events extends Dbh
	{


		protected function updateEventById($event_title, $event_date, $event_venue, $event_img, $event_desc, $token) {
			$sql = 'UPDATE events SET event_title = ?, event_date = ?, event_venue = ?, event_img = ?, event_desc = ? WHERE md5(event_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$event_title, $event_date, $event_venue, $event_img, $event_desc, $token]);
			$result;
			if ($status) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}

		protected function showEventById($token) {
			$sql = 'SELECT * FROM events WHERE md5(event_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$token]);
			$row = $stmt->rowCount();
			$result;
			if ($row == 1) {
				$result = $stmt->fetchAll();
			}
			return $result;
		}
		

		protected function deleteEventById($token) {
			$sql = 'DELETE FROM events WHERE md5(event_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$token]);
			$result;
			if ($status) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}

		protected function checkEvent($event_title, $event_date, $event_venue, $event_img, $event_desc) {
			$sql = 'SELECT * FROM events WHERE event_title = ? AND event_date = ? AND event_venue = ? AND event_img = ? AND event_desc = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$event_title, $event_date, $event_venue, $event_img, $event_desc]);
			$row = $stmt->rowCount();
			$result;
			if ($row > 0) {
				$result = false;
			}else{
				$result = true;
			}
			return $result;
		}

		protected function getThreeEvents() {
			$sql = 'SELECT * FROM events WHERE event_status = ? ORDER BY event_id DESC LIMIT 3';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute(['1']);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}

		protected function getAllEvents() {
			$sql = 'SELECT * FROM events WHERE event_status = ? ORDER BY event_id DESC';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute(['1']);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}

		protected function setEvent($event_title, $event_date, $event_venue, $event_img, $event_desc) {
			$sql = 'INSERT INTO events(event_title, event_date, event_venue, event_img, event_desc) VALUES(?, ?, ?, ?, ?)';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$event_title, $event_date, $event_venue, $event_img, $event_desc]);
			$result;
			if ($status) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}
	}