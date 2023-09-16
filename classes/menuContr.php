<?php 

	/**
	 * 
	 */
	class MenuContr extends Menu
	{
		private $menuName;
		private $menuLink;
		
		public function __construct($menuName, $menuLink)
		{
			$this->menuName = $menuName;
			$this->menuLink = $menuLink;
		}

		
	}