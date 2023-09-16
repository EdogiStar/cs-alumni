<?php 

	/**
	 * 
	 */
	class News extends Dbh
	{


		protected function updateNewsById($news_title, $news_date, $news_img, $news_desc, $token) {
			$sql = 'UPDATE news SET news_title = ?, news_date = ?, news_img = ?, news_desc = ? WHERE md5(news_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$news_title, $news_date, $news_img, $news_desc, $token]);
			$result;
			if ($status) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}

		protected function showNewsById($token) {
			$sql = 'SELECT * FROM news WHERE md5(news_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$token]);
			$row = $stmt->rowCount();
			$result;
			if ($row == 1) {
				$result = $stmt->fetchAll();
			}
			return $result;
		}
		

		protected function deleteNewsById($token) {
			$sql = 'DELETE FROM news WHERE md5(news_id) = ?';
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

		protected function checkNews($news_title, $news_date, $news_img, $news_desc) {
			$sql = 'SELECT * FROM news WHERE news_title = ? AND news_date = ? AND news_desc = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$news_title, $news_date, $news_desc]);
			$row = $stmt->rowCount();
			$result;
			if ($row > 0) {
				$result = false;
			}else{
				$result = true;
			}
			return $result;
		}

		protected function getThreeNews() {
			$sql = 'SELECT * FROM news WHERE news_status = ? ORDER BY news_id DESC LIMIT 3';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute(['1']);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}

		protected function getAllNews() {
			$sql = 'SELECT * FROM news WHERE news_status = ? ORDER BY news_id DESC';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute(['1']);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}

		protected function setNews($news_title, $news_date, $news_img, $news_desc) {
			$sql = 'INSERT INTO news(news_title, news_date, news_img, news_desc) VALUES(?, ?, ?, ?)';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$news_title, $news_date, $news_img, $news_desc]);
			$result;
			if ($status) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}
	}