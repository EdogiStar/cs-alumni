<?php 

	/**
	 * 
	 */
	class ContactContr extends Contact
	{
		private $name;
		private $email;
		private $phone;
		private $message;
		
		public function __construct($name, $email, $phone, $message)
		{
			$this->name = $name;
			$this->email = $email;
			$this->phone = $phone;
			$this->message = $message;
		}


		public function deleteContact($token) {
			
			$status = $this->deleteContactById($token);
			if ($status == true) {
				$success = 'Deleted Successfully';
				header('location: ../admin/contact.php?success='.$success);
			}else{
				$error = 'Failed, Try Again';
				header('location: ../admin/contact.php?error='.$error);
			}
		}

		public function createContact() {
			if ($this->emptyInputs() == false) {
				$error = 'All fields are required';
				header('location: ../contact.php?error='.$error);
				exit();
			}

			$status = $this->sendMessage($this->name, $this->email, $this->phone, $this->message);
			if ($status == true) {
				$success = 'Message Sent Successfully';
				header('location: ../contact.php?success='.$success);
			}else{
				$error = 'Error! Message Not Sent, Try Again';
				header('location: ../contact.php?error='.$error);
			}
		}

		private function emptyInputs() {
			$result;
			if(empty($this->name)){
				$result = false;
			}else if(empty($this->email)){
				$result = false;
			}else if(empty($this->phone)){
				$result = false;
			}else if(empty($this->message)){
				$result = false;
			}else{
				$result = true;
			}
			return $result;
		}
		


	}//end of class