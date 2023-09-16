<?php 

	/**
	 * 
	 */
	class Skills extends Dbh
	{


		protected function updateSkillById($skillName, $token) {
			$sql = 'UPDATE skills SET skill_name = ? WHERE md5(skill_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$skillName, $token]);
			$result;
			if ($status) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}

		protected function showSkillById($token) {
			$sql = 'SELECT * FROM skills WHERE md5(skill_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$token]);
			$row = $stmt->rowCount();
			$result;
			if ($row == 1) {
				$result = $stmt->fetchAll();
			}
			return $result;
		}
		

		protected function deleteSkillById($token) {
			$sql = 'DELETE FROM skills WHERE md5(skill_id) = ?';
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

		protected function checkSkill($skillName) {
			$sql = 'SELECT * FROM skills WHERE skill_name = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$skillName]);
			$row = $stmt->rowCount();
			$result;
			if ($row > 0) {
				$result = false;
			}else{
				$result = true;
			}
			return $result;
		}


		protected function getAllSkills() {
			$sql = 'SELECT * FROM skills WHERE skill_status = ? ORDER BY skill_id DESC';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute(['1']);
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}

		protected function setSkill($skillName) {
			$sql = 'INSERT INTO skills(skill_name) VALUES(?)';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$skillName]);
			$result;
			if ($status) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}
	}