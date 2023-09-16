<?php 

	/**
	 * 
	 */
	class Menu extends Dbh
	{

		protected function getAllMenu() {
			$sql = 'SELECT * FROM menu';
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute();
			$row = $stmt->rowCount();
			$result = $stmt->fetchAll();
			return $result;
		}
	}