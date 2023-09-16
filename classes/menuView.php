<?php 

	class MenuView extends Menu {

		public function showAllMenu() {
			$results = $this->getAllMenu();
			foreach ($results as $result) {
				$token = $result['menu_id'];
				$token = md5($token);
				$menuName = $result['menu_name'];
				$menuLink = $result['menu_link'];
				echo '<li class="nav-item mx-0 mx-lg-1">
						<a class="nav-link py-3 px-0 px-lg-3 rounded" href="#'.$menuLink.'">'.$menuName.'</a>
					  </li>';
			}
		}

	}