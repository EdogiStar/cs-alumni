<?php 

	class NewsView extends News {

		
		public function showMenuSkills() {
			$results = $this->getAllSkills();
			foreach ($results as $result) {
				$token = $result['skill_id'];
				$token = md5($token);
				$skillName = $result['skill_name'];
				echo '<li class="nav-item"> <a class="nav-link" href="skills.php">'.$skillName.'</a></li>';
			}
		}

		public function showAllSkills() {
			$results = $this->getAllSkills();
			foreach ($results as $result) {
				$token = $result['skill_id'];
				$token = md5($token);
				$skillName = $result['skill_name'];
				echo '<span>*'.$skillName.'</span>* ';
			}
		}
		
		public function showAllUserNews() {
			$results = $this->getAllNews();
			foreach ($results as $result) {
				$token = $result['news_id'];
				$token = md5($token);
				$news_title = $result['news_title'];
				$news_date = $result['news_date'];
				$news_img = $result['news_img'];
				$news_desc = $result['news_desc'];
				$content = substr($news_desc, 0, 150);
				echo '<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
			              <a href="news.php?read_news='.$token.', '.$news_title.', '.$news_date.', '.$news_img.', '.$news_desc.'" class="probootstrap-featured-news-box">
			                <figure class="probootstrap-media"><img src="admin/assets/images/news/'.$news_img.'" alt="News Photo" class="img-responsive"></figure>
			                <div class="probootstrap-text">
			                  <h3>'.$news_title.'</h3>
			                  <p>'.substr($news_desc, 0, 100).'...</p>
			                  <span class="probootstrap-date"><i class="icon-calendar"></i>'.$news_date.'</span>
			                  <span class="probootstrap-location"><i class="icon-user2"></i>By Admin</span>
			                </div>
			              </a>
			            </div>';
			}
		}

		public function showUserNews() {
			$results = $this->getThreeNews();
			foreach ($results as $result) {
				$token = $result['news_id'];
				$token = md5($token);
				$news_title = $result['news_title'];
				$news_date = $result['news_date'];
				$news_img = $result['news_img'];
				$news_desc = $result['news_desc'];
				$content = substr($news_desc, 0, 150);
				echo '<div class="item">
                      <a href="news.php?read_news='.$token.', '.$news_title.', '.$news_date.', '.$news_img.', '.$news_desc.'" class="probootstrap-featured-news-box">
                        <figure class="probootstrap-media"><img src="admin/assets/images/news/'.$news_img.'" alt="News photo" class="img-responsive"></figure>
                        <div class="probootstrap-text">
                          <h3>'.$news_title.'</h3>
                          <p>'.$content.'....</p>
                          <span class="probootstrap-date"><i class="icon-calendar"></i>'.$news_date.'</span>
                        </div>
                      </a>
                    </div>';
			}
		}

		public function showAdminNews() {
			$results = $this->getAllNews();
			foreach ($results as $result) {
				$token = $result['news_id'];
				$token = md5($token);
				$news_title = $result['news_title'];
				$news_date = $result['news_date'];
				$news_img = $result['news_img'];
				$news_desc = $result['news_desc'];
				echo '<tr>
                            <td>
                              <p>'.$news_title.'</p>
                              '.$news_date.'
                            </td>
                            <td>
                              <a href="news.php?read_news='.$token.', '.$news_title.', '.$news_date.', '.$news_img.', '.$news_desc.'" class="badge badge-gradient-success">View</a>
                            </td>
                            <td>
                              <a href="news.php?edit_news='.$token.', '.$news_title.', '.$news_date.', '.$news_img.', '.$news_desc.'" class="badge badge-gradient-primary">Edit</a>
                            </td>
                            <td>
                              <a href="delete_news.php?del_news='.$token.', '.$news_title.', '.$news_date.', '.$news_img.', '.$news_desc.'" class="badge badge-gradient-danger">Delete</a>
                            </td>
                          </tr>';
			}
		}
	}