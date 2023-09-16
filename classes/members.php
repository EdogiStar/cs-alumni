<?php 

	/**
	 * 
	 */
	class Members extends Dbh
	{


		protected function updateMemberById($surname, $matNo, $dob, $grad_yr, $token) {
			$sql = 'UPDATE members SET surname = ?, matNo = ?, dob = ?, grad_yr = ? WHERE md5(id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$surname, $matNo, $dob, $grad_yr, $token]);
			$result;
			if ($status) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}

		protected function showMemberById($token) {
			$sql = 'SELECT * FROM members WHERE md5(id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$token]);
			$row = $stmt->rowCount();
			$result;
			if ($row == 1) {
				$result = $stmt->fetchAll();
			}
			return $result;
		}
		

		protected function deleteMemberById($token) {
			$sql = 'DELETE FROM members WHERE md5(id) = ?';
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

		protected function checkMatNoExist($matNo) {
			$sql = 'SELECT * FROM members WHERE  matNo = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$matNo]);
			$row = $stmt->rowCount();
			$result;
			if ($row > 0) {
				$result = false;
			}else{
				$result = true;
			}
			return $result;
		}

		protected function getAllMembersByRating() {
			$sql = 'SELECT * FROM members ORDER BY rating DESC';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([]);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}
		
		protected function getAllMembers() {
			$sql = 'SELECT * FROM members';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([]);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}

		protected function setMember($surname, $matNo, $dob, $grad_yr) {
			$sql = 'INSERT INTO members(surname, matNo, dob, grad_yr, alumni_office) VALUES(?, ?, ?, ?, ?)';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$surname, $matNo, $dob, $grad_yr, 'Member']);
			$result;
			if ($status) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}
	}