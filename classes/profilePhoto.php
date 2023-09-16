<?php 

	/**
	 * 
	 */
	class ProfilePhoto extends Dbh
	{
		
		protected function showAllProfilePhoto() {
			$sql = 'SELECT * FROM picture WHERE pic_status = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute(['0']);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}

		protected function setNewPic($picName, $token) {
			// $sql = 'UPDATE picture SET pic_src = ? WHERE md5(pic_id) = ?';
			$sql = 'INSERT INTO picture($pic_src, pic_alt) VALUES(?, ?)';

			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$picName, 'Profile Photo']);
			$result;
			if ($status) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}

		protected function showProfilePhoto() {
			$sql = 'SELECT * FROM picture WHERE pic_status = ? LIMIT 1';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute(['1']);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}
	}