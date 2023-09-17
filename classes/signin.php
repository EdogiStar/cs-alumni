<?php 

	/**
	 * 
	 */
	class Signin extends Dbh
	{	
		
		protected function resetUserPassword($userID, $pwd) {
	    	$sql = 'UPDATE user SET user_password = ? WHERE md5(user_id) = ?';
			$stmt = $this->connect()->prepare($sql);
			$status = $stmt->execute([$pwd, $userID]);
			$result;
			if ($status) {
				$result = true;
			}else{
				$result = false;
			}
			return $result;
	    }

		protected function getUserByEmail($email) {
	    	$sql = 'SELECT * FROM user WHERE username = ? OR user_email = ? LIMIT 1';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$email, $email]);
			$row = $stmt->rowCount();
			if ($stmt->rowCount() == 0) {
					$stmt=null;
					$error = 'Wrong Username or Email Provided';
					header('location: ../admin/password_reset.php?error='.$error);
					exit();
				}
			return $results = $stmt->fetchAll();

	    }

	    protected function getUserProfile($userID) {
	    	$sql = 'SELECT * FROM admin WHERE admin_id = ?';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$userID]);
			$row = $stmt->rowCount();
			return $results = $stmt->fetchAll();
	    }
	    
	    protected function getUserLog($uId, $pwd){
			$sql = 'SELECT * FROM members WHERE matNo = ? AND password = ? LIMIT 1';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$uId, $pwd]);
			$row = $stmt->rowCount();
			$results = $stmt->fetchAll();

				if ($stmt->rowCount() == 0) {
					$stmt=null;
					$error = 'Wrong Username/Password Combination';
					header('location: ../login.php?error='.$error);
					exit();
				}
				
				foreach ($results as $result) {
					$user=$result['id'];
				}
				session_start();
				$_SESSION['userID']=$user;
				$stmt=null;
				// $success = 'Logged in Successfully';
				header('location: ../index.php');
			}

		

		protected function getUser($uId, $pwd){
			
			$sql = 'SELECT * FROM admin WHERE admin_email = ? AND admin_password = ? LIMIT 1';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$uId, $pwd]);
			$row = $stmt->rowCount();
			$results = $stmt->fetchAll();

				if ($stmt->rowCount() == 0) {
					$stmt=null;
					$error = 'Wrong Username/Password Combination';
					header('location: ../admin/index.php?error='.$error);
					exit();
				}
				
				foreach ($results as $result) {
					$user=$result['admin_id'];
				}
				session_start();
				$_SESSION['userID']=$user;
				$stmt=null;
				// $success = 'Logged in Successfully';
				header('location: ../admin/dashboard.php');
			}//geUser

		}
	// }