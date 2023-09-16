<?php 

	/**
	 * 
	 */
	class SocialLinksContr extends SocialLinks
	{
		private $href;
		private $icon;
		
		public function __construct($href, $icon)
		{
			$this->href = $href;
			$this->icon = $icon;
		}

		
		
		public function updateLink($token) {

			$result = $this->updateLinkById($this->href, $this->icon, $token);
			if ($result == true) {
				$success = 'Updated Successfully';
				header('location: ../admin/social.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/social.php?error='.$error);
				exit();
			}
		}
		
		public function setNewLink() {

			if ($this->emptyInputs() == false) {
				$error = 'All fields are required';
				header('location: ../admin/social.php?error='.$error);
				exit();
			}

			// no errors
			$result = $this->setSocialLink($this->href, $this->icon);
			if ($result == true) {
				$success = 'Added Successfully';
				header('location: ../admin/social.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/social.php?error='.$error);
				exit();
			}
		}


		public function showSocialLink($token) {
			$result = $this->showLinkById($token);
			return $result;
		}

		public function deleteLink($token) {
			
			$status = $this->deleteLinkById($token);
			if ($status == true) {
				$success = 'Deleted Successfully';
				header('location: ../admin/social.php?success='.$success);
			}else{
				$error = 'Failed, Try Again';
				header('location: ../admin/social.php?error='.$error);
			}
		}

		private function emptyInputs() {
			$result;
			if(empty($this->href)){
				$result = false;
			}else if(empty($this->icon)){
				$result = false;
			}else{
				$result = true;
			}
			return $result;
		}
		
	}