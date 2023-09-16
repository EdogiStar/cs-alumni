<?php 

	/**
	 * 
	 */
	class NewsContr extends News
	{
		private $news_title;
		private $news_date;
		private $news_img;
		private $news_desc;
		
		public function __construct($news_title, $news_date, $news_img, $news_desc)
		{
			$this->news_title = $news_title;
			$this->news_date = $news_date;
			$this->news_img = $news_img;
			$this->news_desc = $news_desc;
		}


		public function updateNews($token) {

			$result = $this->updateNewsById($this->news_title, $this->news_date, $this->news_img, $this->news_desc, $token);
			if ($result == true) {
				$success = 'Updated Successfully';
				header('location: ../admin/news.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/news.php?error='.$error);
				exit();
			}
		}

		public function showNewsRecord($token) {
			$result = $this->showNewsById($token);
			return $result;
		}

		public function setNewNews() {

			if ($this->emptyInputs() == false) {
				$error = 'All fields are required';
				header('location: ../admin/news.php?error='.$error);
				exit();
			}

			if ($this->checkNews($this->news_title, $this->news_date, $this->news_img, $this->news_desc) == false) {
				$error = 'News Exists';
				header('location: ../admin/news.php?error='.$error);
				exit();	
			}

			// no errors
			$result = $this->setNews($this->news_title, $this->news_date, $this->news_img, $this->news_desc);
			if ($result == true) {
				$success = 'Added Successfully';
				header('location: ../admin/news.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/news.php?error='.$error);
				exit();
			}
		}

		public function deleteNews($token) {
			$result = $this->deleteNewsById($token);
			if ($result == true) {
				$success = 'Deleted Successfully';
				header('location: ../admin/news.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/news.php?error='.$error);
				exit();
			}
		}

		private function emptyInputs() {
			$result;
			if(empty($this->news_title) || empty($this->news_date) || empty($this->news_desc) || empty($this->news_img)){
				$result = false; 
			}else{
				$result = true;
			}
			return $result;
		}
		
	}