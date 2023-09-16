<?php 

	/**
	 * 
	 */
	class Gallery extends Dbh
	{

		
		protected function updateGalleryById($token, $caption, $img_src) {
			$sql = 'UPDATE gallery SET caption = ?, img_src = ? WHERE md5(gallery_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$caption, $img_src, $token]);
			return $status;
		}

		protected function getGalleryById($token) {
			$sql = 'SELECT * FROM gallery WHERE md5(gallery_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$token]);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}

		protected function deleteGalleryById($token) {
			$sql = 'DELETE FROM gallery WHERE md5(gallery_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$token]);
			return $status;
		}

		protected function setGallery($caption, $img_src) {
			$sql = 'INSERT INTO gallery(caption, img_src) VALUES(?, ?)';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$caption, $img_src]);
			return $status;
		}

		protected function getPortfolioByNumber() {
			$sql = 'SELECT * FROM portfolio WHERE status = ? ORDER BY id DESC LIMIT 6';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute(['1']);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}

		protected function getAllGallery() {
			$sql = 'SELECT * FROM gallery WHERE status = ? ORDER BY gallery_id DESC';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute(['1']);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}

		protected function checkGallery($caption) {
			$sql = 'SELECT * FROM gallery WHERE caption = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$caption]);
			$row = $stmt->rowCount();
			$result;
			if ($row > 0) {
				$result = false;
			}else{
				$result = true;
			}
			return $result;
		}

		
		
	}