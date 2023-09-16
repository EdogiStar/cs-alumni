<?php 

	class signinView extends Signin {

		

		public function getUserDetails($userID) {
			return $results = $this->getUserProfile($userID);
		}
		

	}