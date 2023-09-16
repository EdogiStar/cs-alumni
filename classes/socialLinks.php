<?php 

	/**
	 * 
	 */
	class SocialLinks extends Dbh
	{

		
		protected function updateLinkById($href, $icon, $token) {
			$sql = 'UPDATE links SET link_href = ?, link_icon = ? WHERE md5(link_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$href, $icon, $token]);
			$result;
			if ($status) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}
		
		protected function showLinkById($token) {
			$sql = 'SELECT * FROM links WHERE md5(link_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$token]);
			$result = $stmt->fetchAll();
			return $result;
		}

		protected function getAactivSocialLinks() {
			$sql = 'SELECT * FROM links WHERE link_status = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute(['1']);
			$result = $stmt->fetchAll();
			return $result;
		}

		
		protected function deleteLinkById($token) {
			$sql = 'DELETE FROM links WHERE md5(link_id) = ?';
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
		
		protected function setSocialLink($href, $icon) {
			$sql = 'INSERT INTO links(link_href, link_icon) VALUES(?, ?)';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$href, $icon]);
			$result;
			if ($status) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}


	}