<?php 

	/**
	 * 
	 */
	class Contact extends Dbh
	{

		

		protected function deleteContactById($token) {
			$sql = 'DELETE FROM contact WHERE md5(contact_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$send = $stmt->execute([$token]);
			$result;
			if ($send) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}

		protected function getAllContacts() {
			$sql = 'SELECT * FROM contact WHERE contact_status = ? ORDER BY contact_id DESC';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute(['1']);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}
		

		protected function sendMessage($name, $email, $phone, $message) {
			$sql = 'INSERT INTO contact(contact_name, contact_email, contact_phone, contact_message) VALUES(?, ?, ?, ?)';
			$stmt = $this->connect()->prepare($sql);
			$send = $stmt->execute([$name, $email, $phone, $message]);
			$result;
			if ($send) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}
	}