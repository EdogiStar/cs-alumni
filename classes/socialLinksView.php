<?php 

	class SocialLinksView extends SocialLinks {

		public function showSocialLinks() {
			$results = $this->getAactivSocialLinks();
			foreach ($results as $result) {
				$token = $result['link_id'];
				$token = md5($token);
				$href = $result['link_href'];
				$icon = $result['link_icon'];
				echo'<a class="btn btn-outline-light btn-social mx-1" href="'.$href.'" target="_blank">
						<i class="'.$icon.'"></i>
					</a>';
			}
		}

		public function showAdminSocialLinks() {
			$results = $this->getAactivSocialLinks();
			foreach ($results as $result) {
				$token = $result['link_id'];
				$token = md5($token);
				$href = $result['link_href'];
				$icon = $result['link_icon'];
				echo '<tr>
                            <td>
                              '.$href.'
                            </td>
                            <td>
                              '.$icon.'
                            </td>
                            <td>
                              <a href="social.php?edit_link='.$token.', '.$href.', '.$icon.'" class="badge badge-gradient-success">Edit</a>
                            </td>
                            <td>
                              <a href="delete_link.php?del_link='.$token.', '.$href.', '.$icon.'" class="badge badge-gradient-danger">Delete</a>
                            </td>
                          </tr>';
			}
		}

	}