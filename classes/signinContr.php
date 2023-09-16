<?php 

	/**
	 * 
	 */
	class SigninContr extends Signin
	{
		private $email;
		private $password;
		
		public function __construct($email, $password)
		{
			$this->email = $email;
			$this->password = $password;
		}

		

		public function checkUser() {
			if ($this->emptyInputs() == false) {
				$error = 'All fields are required';
				header('location: ../admin/index.php?error='.$error);
				exit();
			}

			$status = $this->getUser($this->email, $this->password);
		}

		public function checkUserByEmail() {
			return $this->getUserByEmail($this->email);
		}
		public function resetPassword($userID, $pwd1, $pwd2) {
			if ($pwd1 == $pwd2) {
				$pwd = md5($pwd1);
				$status = $this->resetUserPassword($userID, $pwd);
				if ($status == true) {
					$success = 'Password Reset Successful';
					header('location: ../admin/index.php?success='.$success);
					exit();
				}else{
					$error = 'Password Reset Failed';
					header('location: ../admin/recover.php?error='.$error);
					exit();
				}

			}else{
				$error = 'Passwords do not match';
				header('location: ../admin/recover.php?error='.$error);
				exit();
			}
		}
		
		private function emptyInputs() {
			$result;
			if(empty($this->email)){
				$result = false;
			}else if(empty($this->password)){
				$result = false;
			}else{
				$result = true;
			}
			return $result;
		}
		


	}//end of class