<?php 

	/**
	 * 
	 */
	class Members extends Dbh
	{

		
		protected function completeRegistration($firstname, $othername, $email, $phone, $password, $token) {
			$sql = 'UPDATE members SET firstname = ?, othername = ?, email = ?, phone = ?, password = ?, status = ? WHERE md5(id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$firstname, $othername, $email, $phone, $password, '1', $token]);
			$result;
			if ($status) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}

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
		
		protected function showMemberByMatNo($token) {
			$sql = 'SELECT * FROM members WHERE md5(matNo) = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$token]);
			$row = $stmt->rowCount();
			$result;
			if ($row == 1) {
				$result = $stmt->fetchAll();
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
		
		protected function checkList($surname, $matNo, $dob) {
			$sql = 'SELECT * FROM members WHERE surname = ? AND matNo = ? AND dob = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$surname, $matNo, $dob]);
			$row = $stmt->rowCount();
			$result;
			if ($row > 0) {
				// record found
				$result = true;
			}else{
				// no record found
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
		
		protected function getRecord($surname, $matNo, $dob) {
			$sql = 'SELECT * FROM members WHERE surname = ? AND matNo = ? AND dob = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$surname, $matNo, $dob]);
			$row = $stmt->rowCount();
			$result = $stmt->fetch();
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