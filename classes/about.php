<?php 

	/**
	 * 
	 */
	class About extends Dbh
	{
		

		protected function updateAboutById($token, $content1, $content2) {
			$sql = 'UPDATE about SET about_content1 = ?, about_content2 = ? WHERE md5(about_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$result = $stmt->execute([$content1, $content2, $token]);
			return $result;
		}

		protected function getAboutById($token) {
			$sql = 'SELECT * FROM about WHERE md5(about_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$token]);
			$result = $stmt->fetchAll();
			return $result;
		}

		protected function getAbout() {
			$sql = 'SELECT * FROM about WHERE about_status = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute(['1']);
			$result = $stmt->fetchAll();
			return $result;
		}
	}