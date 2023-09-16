<?php 

	class EventsView extends Events {

		
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
		
		public function showAllUserEvents() {
			$results = $this->getAllEvents();
			foreach ($results as $result) {
				$token = $result['event_id'];
				$token = md5($token);
				$event_title = $result['event_title'];
				$event_date = $result['event_date'];
				$event_venue = $result['event_venue'];
				$event_img = $result['event_img'];
				$event_desc = $result['event_desc'];
				echo '<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
			              <a href="events.php?read_event='.$token.', '.$event_title.', '.$event_date.', '.$event_venue.', '.$event_img.', '.$event_desc.'" class="probootstrap-featured-news-box">
			                <figure class="probootstrap-media"><img src="admin/assets/images/event/'.$event_img.'" alt="Event Photo" class="img-responsive"></figure>
			                <div class="probootstrap-text">
			                  <h3>'.$event_title.'</h3>
			                  <span class="probootstrap-date"><i class="icon-calendar"></i>'.$event_date.'</span>
			                  <span class="probootstrap-location"><i class="icon-location2"></i>'.$event_venue.'</span>
			                </div>
			              </a>
			            </div>';
			}
		}

		public function showUserEvents() {
			$results = $this->getThreeEvents();
			foreach ($results as $result) {
				$token = $result['event_id'];
				$token = md5($token);
				$event_title = $result['event_title'];
				$event_date = $result['event_date'];
				$event_venue = $result['event_venue'];
				$event_img = $result['event_img'];
				$event_desc = $result['event_desc'];
				echo '<div class="item">
                          <a href="events.php?read_event='.$token.', '.$event_title.', '.$event_date.', '.$event_venue.', '.$event_img.', '.$event_desc.'" class="probootstrap-featured-news-box">
                            <figure class="probootstrap-media"><img src="admin/assets/images/event/'.$event_img.'" alt="Event Photo" class="img-responsive"></figure>
                            <div class="probootstrap-text">
                              <h3>'.$event_title.'</h3>
                              <span class="probootstrap-date"><i class="icon-calendar"></i>'.$event_date.'</span>
                              <span class="probootstrap-location"><i class="icon-location2"></i>'.$event_venue.'</span>
                            </div>
                          </a>
                        </div>';
			}
		}

		public function showAdminEvents() {
			$results = $this->getAllEvents();
			foreach ($results as $result) {
				$token = $result['event_id'];
				$token = md5($token);
				$event_title = $result['event_title'];
				$event_date = $result['event_date'];
				$event_venue = $result['event_venue'];
				$event_img = $result['event_img'];
				$event_desc = $result['event_desc'];
				echo '<tr>
                            <td>
                              <p>'.$event_title.'</p>
                              '.$event_date.' - '.$event_venue.'
                            </td>
                            <td>
                              <a href="events.php?read_event='.$token.', '.$event_title.', '.$event_date.', '.$event_venue.', '.$event_img.', '.$event_desc.'" class="badge badge-gradient-success">View</a>
                            </td>
                            <td>
                              <a href="events.php?edit_event='.$token.', '.$event_title.', '.$event_date.', '.$event_venue.', '.$event_img.', '.$event_desc.'" class="badge badge-gradient-primary">Edit</a>
                            </td>
                            <td>
                              <a href="delete_event.php?del_event='.$token.', '.$event_title.', '.$event_date.', '.$event_venue.', '.$event_img.', '.$event_desc.'" class="badge badge-gradient-danger">Delete</a>
                            </td>
                          </tr>';
			}
		}
	}