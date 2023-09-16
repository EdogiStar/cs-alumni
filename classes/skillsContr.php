<?php 

	/**
	 * 
	 */
	class SkillsContr extends Skills
	{
		private $skillName;
		
		public function __construct($skillName)
		{
			$this->skillName = $skillName;
		}


		public function updateSkill($token) {

			$result = $this->updateSkillById($this->skillName, $token);
			if ($result == true) {
				$success = 'Updated Successfully';
				header('location: ../admin/skills.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/skills.php?error='.$error);
				exit();
			}
		}

		public function showSkillRecord($token) {
			$result = $this->showSkillById($token);
			return $result;
		}

		public function setNewSkill() {

			if ($this->emptyInputs() == false) {
				$error = 'Enter title of skill';
				header('location: ../admin/skills.php?error='.$error);
				exit();
			}

			if ($this->checkSkill($this->skillName) == false) {
				$error = 'Skill Exists';
				header('location: ../admin/skills.php?error='.$error);
				exit();	
			}

			// no errors
			$result = $this->setSkill($this->skillName);
			if ($result == true) {
				$success = 'Added Successfully';
				header('location: ../admin/skills.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/skills.php?error='.$error);
				exit();
			}
		}

		public function deleteSkill($token) {
			$result = $this->deleteSkillById($token);
			if ($result == true) {
				$success = 'Deleted Successfully';
				header('location: ../admin/skills.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/skills.php?error='.$error);
				exit();
			}
		}

		private function emptyInputs() {
			$result;
			if(empty($this->skillName)){
				$result = false;
			}else{
				$result = true;
			}
			return $result;
		}
		
	}