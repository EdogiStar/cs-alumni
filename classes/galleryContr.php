<?php 

	/**
	 * 
	 */
	class GalleryContr extends Gallery
	{
		private $caption;
		private $img_src;
		
		public function __construct($caption, $img_src)
		{
			$this->caption = $caption;
			$this->img_src = $img_src;
		}

		
		public function updateGallery($token) {

			$result = $this->updateGalleryById($token, $this->caption, $this->img_src);
			if ($result == true) {
				$success = 'Edited Successfully';
				header('location: ../admin/gallery.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/gallery.php?error='.$error);
				exit();
			}
		}

		public function showGalleryRecord($token) {
			return $result = $this->getGalleryById($token);
		}

		public function deleteGallery($token) {
			$result = $this->deleteGalleryById($token);
			if ($result == true) {
				$success = 'Deleted Successfully';
				header('location: ../admin/gallery.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/gallery.php?error='.$error);
				exit();
			}
		}

		public function setNewGallery() {

			if ($this->emptyInputs() == false) {
				$error = 'All fields are required';
				header('location: ../admin/portfolio.php?error='.$error);
				exit();
			}

			if ($this->checkGallery($this->caption) == false) {
				$error = 'Gallery Item Exists';
				header('location: ../admin/gallery.php?error='.$error);
				exit();	
			}

			// no errors
			$result = $this->setGallery($this->caption, $this->img_src);
			if ($result == true) {
				$success = 'Added Successfully';
				header('location: ../admin/gallery.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/gallery.php?error='.$error);
				exit();
			}
		}

		private function emptyInputs() {
			$result;
			if(empty($this->caption) || empty($this->img_src)){
				$result = false; 
			}else{
				$result = true;
			}
			return $result;
		}

		
	}