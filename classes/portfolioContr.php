<?php 

	/**
	 * 
	 */
	class PortfolioContr extends Portfolio
	{
		private $title;
		private $img_src;
		private $img_alt;
		private $content;
		private $aria_labelledby;
		private $data_bs_target;
		private $modal_id;

		
		public function __construct($title, $img_src, $img_alt, $content, $aria_labelledby, $data_bs_target, $modal_id)
		{
			$this->title = $title;
			$this->img_src = $img_src;
			$this->img_alt = $img_alt;
			$this->content = $content;
			$this->aria_labelledby = $aria_labelledby;
			$this->data_bs_target = $data_bs_target;
			$this->modal_id = $modal_id;

		}

		
		public function updatePortfolio($token) {

			$result = $this->updatePortfolioById($token, $this->title, $this->img_src, $this->img_alt, $this->content, $this->aria_labelledby, $this->data_bs_target, $this->modal_id);
			if ($result == true) {
				$success = 'Edited Successfully';
				header('location: ../admin/portfolio.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/portfolio.php?error='.$error);
				exit();
			}
		}

		public function showPortfolioRecord($token) {
			return $result = $this->getPortfolioById($token);
		}

		public function deletePortfolio($token) {
			$result = $this->deletePortfolioById($token);
			if ($result == true) {
				$success = 'Deleted Successfully';
				header('location: ../admin/portfolio.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/portfolio.php?error='.$error);
				exit();
			}
		}

		public function setNewPortfolio() {

			if ($this->emptyInputs() == false) {
				$error = 'All fields are required';
				header('location: ../admin/portfolio.php?error='.$error);
				exit();
			}

			if ($this->checkPortfolio($this->title) == false) {
				$error = 'Portfolio Exists';
				header('location: ../admin/portfolio.php?error='.$error);
				exit();	
			}

			// no errors
			$result = $this->setPortfolio($this->title, $this->img_src, $this->img_alt, $this->content, $this->aria_labelledby, $this->data_bs_target, $this->modal_id);
			if ($result == true) {
				$success = 'Added Successfully';
				header('location: ../admin/portfolio.php?success='.$success);
				exit();
			}else{
				$error = 'Failed, try again';
				header('location: ../admin/portfolio.php?error='.$error);
				exit();
			}
		}

		private function emptyInputs() {
			$result;
			if(empty($this->title) || empty($this->img_src) || empty($this->img_alt) || empty($this->content) || empty($this->modal_id)){
				$result = false; 
			}else{
				$result = true;
			}
			return $result;
		}

		
	}