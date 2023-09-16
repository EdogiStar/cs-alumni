<?php 

	/**
	 * 
	 */
	class Portfolio extends Dbh
	{

		
		protected function updatePortfolioById($token, $title, $img_src, $img_alt, $content, $aria_labelledby, $data_bs_target, $modal_id) {
			$sql = 'UPDATE portfolio SET title = ?, img_src = ?, img_alt = ?, content = ?, aria_labelledby = ?, data_bs_target = ?, modal_id = ? WHERE md5(id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$title, $img_src, $img_alt, $content, $aria_labelledby, $data_bs_target, $modal_id, $token]);
			return $status;
		}

		protected function getPortfolioById($token) {
			$sql = 'SELECT * FROM portfolio WHERE md5(id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$token]);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}

		protected function deletePortfolioById($token) {
			$sql = 'DELETE FROM portfolio WHERE md5(id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$token]);
			return $status;
		}

		protected function setPortfolio($title, $img_src, $img_alt, $content, $aria_labelledby, $data_bs_target, $modal_id) {
			$sql = 'INSERT INTO portfolio(title, img_src, img_alt, content, aria_labelledby, data_bs_target, modal_id) VALUES(?, ?, ?, ?, ?, ?, ?)';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$title, $img_src, $img_alt, $content, $aria_labelledby, $data_bs_target, $modal_id]);
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

		protected function getAllPortfolio() {
			$sql = 'SELECT * FROM portfolio WHERE status = ? ORDER BY id DESC';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute(['1']);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}

		protected function checkPortfolio($title) {
			$sql = 'SELECT * FROM portfolio WHERE title = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$title]);
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