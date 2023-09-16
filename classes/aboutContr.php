<?php 

	/**
	 * 
	 */
	class AboutContr extends About
	{
		private $content1;
		private $content2;
		
		public function __construct($content1, $content2)
		{
			$this->content1 = $content1;
			$this->content2 = $content2;
		}

		

		public function updateAbout($token) {
			$result = $this->updateAboutById($token, $this->content1, $this->content2);
			if ($result == true) {
				$success = 'Updated Successfully';
				header('location: ../admin/about.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/about.php?error='.$error);
				exit();
			}
		}

		public function showAboutRecord($token) {
			$result = $this->getAboutById($token);
			return $result;
		}

		private function emptyInputs() {
			$result;
			if(empty($this->content1)){
				$result = false;
			}else if(empty($this->content2)){
				$result = false;
			}else{
				$result = true;
			}
			return $result;
		}

		
	}