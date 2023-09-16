<?php 

	/**
	 * 
	 */
	class ProfilePhotoContr extends ProfilePhoto
	{
		private $picName;
		private $picSrc;
		
		public function __construct($picName, $picSrc)
		{
			$this->picName = $picName;
			$this->picSrc = $picSrc;
		}

		
		public function setNewProfilePhoto($token) {
			if ($this->emptyInputs() == false) {
				$error = 'Please choose an image to upload';
				header('location: ../admin/profile.php?error='.$error);
				exit();
			}
			$status = $this->setNewPic($this->picName, $token);
				if ($status == true) {
					$success = 'Uploaded Successfully';
					header('location: ../admin/profile.php?success='.$success);
					exit();
				}else{
					$error = 'Password Reset Failed';
					header('location: ../admin/profile.php?error='.$error);
					exit();
				}
		}
		

		private function emptyInputs() {
			$result;
			if(empty($this->picName)){
				$result = false;
			}else if(empty($this->picSrc)){
				$result = false;
			}else{
				$result = true;
			}
			return $result;
		}
		
	}