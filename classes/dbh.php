<?php 
	/**
	 * 
	 */
	class Dbh
	{
		public function connect(){
			try {
				 $username = 'root';
				 $password = '';
				$dbh=new PDO('mysql:host=localhost;dbname=cs_alumni_ibbul', $username, $password);
				return $dbh;
			} catch (Exception $e) {
				print 'Error: '.$e->getMessage().'<br>';
				die();
			}
		}
	}
?>