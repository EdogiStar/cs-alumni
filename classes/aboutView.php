<?php 

	class AboutView extends About {

		

		public function showAboutRecord($token) {
			return $results = $this->getAboutById($token);
		}
		
		public function showUserAbout2() {
			$results = $this->getAbout();
			foreach ($results as $result) {
				$token = $result['about_id'];
				$token = md5($token);
				$content1 = $result['about_content1'];
				$content2 = $result['about_content2'];
				echo 	'<p>'.$content1.'</p>';
				echo 	'<p><a href="about.php" class="btn btn-primary">Learn More</a></p>  ';
			}
		}

		public function showUserAbout() {
			$results = $this->getAbout();
			foreach ($results as $result) {
				$token = $result['about_id'];
				$token = md5($token);
				$content1 = $result['about_content1'];
				$content2 = $result['about_content2'];
				echo 	'<p>'.$content1.'</p>';
				echo 	'<p>'.$content2.'</p>';
			}
		}

		public function showAdminAbout() {
			$results = $this->getAbout();
			foreach ($results as $result) {
				$token = $result['about_id'];
				$token = md5($token);
				$content1 = $result['about_content1'];
				$content2 = $result['about_content2'];
				echo 	'<p>'.$content1.'</p>';
				echo 	'<p>'.$content2.'</p>';
				echo 	'<p><a  href="about.php?edit_about='.$token.', '.$content1.', '.$content2.'" class="badge badge-gradient-success">Edit</a></p>';
			}
		}

		public function showAbout() {
			$results = $this->getAbout();
			foreach ($results as $result) {
				$token = $result['about_id'];
				$token = md5($token);
				$content1 = $result['about_content1'];
				$content2 = $result['about_content2'];
				echo '<div class="col-lg-4 ms-auto"><p class="lead">'.$content1.'</p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">'.$content2.'</p></div>';
			}
		}

	}