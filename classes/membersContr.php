<?php 

	/**
	 * 
	 */
	class MembersContr extends Members
	{
		private $surname;
		private $matNo;
		private $dob;
		private $grad_yr;
		
		public function __construct($surname, $matNo, $dob, $grad_yr)
		{
			$this->surname = $surname;
			$this->matNo = $matNo;
			$this->dob = $dob;
			$this->grad_yr = $grad_yr;
		}

		
		public function completeReg($firstname, $othername, $email, $phone, $password, $token) {
			if (empty($firstname) || empty($email) || empty($phone) || empty($password)) {
				$error = 'All Fields Are Required';
				header('location: ../senate_list.php?error='.$error);
				exit();
			}

			$result = $this->completeRegistration($firstname, $othername, $email, $phone, $password, $token);
				$success = 'Registration Successful';
				header('location: ../login.php?success='.$success);
				exit();
			}else{
				$error = 'Registration Failed, try again';
				header('location: ../senate_list.php?error='.$error);
				exit();
			}
		}

		public function updateMember($token) {

			$result = $this->updateMemberById($this->surname, $this->matNo, $this->dob, $this->grad_yr, $token);
			if ($result == true) {
				$success = 'Updated Successfully';
				header('location: ../admin/members.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/members.php?error='.$error);
				exit();
			}
		}
		
		public function checkSenateList() {
			if ($this->checkList($this->surname, $this->matNo, $this->dob) == false) {
				// No Record Found
				$error = 'No Record Found';
				header('location: ../senate_list.php?error='.$error);
				exit();	
			}else{
				// Record Found, get record
				$getRecord = $this->getRecord($this->surname, $this->matNo, $this->dob);
				if ($getRecord['status'] == 0) {
					// enrolled and eligible to register
					// pass matNo
					$matNo = md5($getRecord['matNo']);
					header('location: ../register.php?token='.$matNo);
					exit();
				}else{
					// activated and cant register again
					$error = 'User Exists, Please Login';
					header('location: ../senate_list.php?error='.$error);
					exit();	
				}
			}
			return $result;
		}

		public function showMemberRecord($token) {
			$result = $this->showMemberById($token);
			return $result;
		}

		public function setNewMember() {

			if ($this->emptyInputs() == false) {
				$error = 'All fields are required';
				header('location: ../admin/members.php?error='.$error);
				exit();
			}

			if ($this->checkMatNoExist($this->matNo) == false) {
				$error = 'Matriculation Number Exists';
				header('location: ../admin/members.php?error='.$error);
				exit();	
			}

			// no errors
			$result = $this->setMember($this->surname, $this->matNo, $this->dob, $this->grad_yr);
			if ($result == true) {
				$success = 'Added Successfully';
				header('location: ../admin/members.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/members.php?error='.$error);
				exit();
			}
		}

		public function deleteMember($token) {
			$result = $this->deleteMemberById($token);
			if ($result == true) {
				$success = 'Deleted Successfully';
				header('location: ../admin/members.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/members.php?error='.$error);
				exit();
			}
		}

		private function emptyInputs() {
			$result;
			if(empty($this->surname) || empty($this->matNo) || empty($this->dob) || empty($this->grad_yr)){
				$result = false; 
			}else{
				$result = true;
			}
			return $result;
		}
		
	}