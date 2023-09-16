<?php 

	class ProfileView extends ProfilePhoto {

		
		public function showAllAdminPhoto() {
			$results = $this->showAllProfilePhoto();
			foreach ($results as $result) {
				$token = $result['pic_id'];
				$token = md5($token);
				$src = $result['pic_src'];
				$alt = $result['pic_alt'];
				echo '<img width="150px" height="150px" class="masthead-avatar mb-5" src="../assets/img/'.$src.'" alt="'.$alt.'" />';
				echo '<a href="profile.php?edit_profile='.$token. ', '.$src.', '.$alt.'" class="btn btn-gradient-primary btn-xs">Set As Profile Photo</a>';
			}
		}

		public function showAdminPhoto() {
			$results = $this->showProfilePhoto();
			foreach ($results as $result) {
				$token = $result['pic_id'];
				$token = md5($token);
				$src = $result['pic_src'];
				$alt = $result['pic_alt'];
				echo '<img class="masthead-avatar mb-5" src="../assets/img/'.$src.'" alt="'.$alt.'" />';
				echo '<a href="profile.php?edit_profile='.$token. ', '.$src.', '.$alt.'" class="btn btn-gradient-primary me-2">Upload New Photo</a>';
			}
		}

		public function showProfilePic() {
			$results = $this->showProfilePhoto();
			foreach ($results as $result) {
				$token = $result['pic_id'];
				$token = md5($token);
				$src = $result['pic_src'];
				$alt = $result['pic_alt'];
				echo '<img class="masthead-avatar mb-5" src="assets/img/'.$src.'" alt="'.$alt.'" />';
			}
		}
		

	}