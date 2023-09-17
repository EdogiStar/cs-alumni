<?php 

	class MembersView extends Members {
		
		public function showMember($token) {
			$result = $this->showMemberByMatNo($token);
			return $result;
		}

		public function showMenuPortfolio() {
			$results = $this->getAllPortfolio();
			foreach ($results as $result) {
				$token = $result['id'];
				$token = md5($token);
				$title = $result['title'];
				$img_src = $result['img_src'];
				$img_alt = $result['img_alt'];
				$content = $result['content'];
				$aria_labelledby = $result['aria_labelledby'];
				$data_bs_target = $result['data_bs_target'];
				$modal_id = $result['modal_id'];
				echo '<li class="nav-item"> <a class="nav-link" href="portfolio.php">'.$title.'</a></li>';
			}
		}
		
		public function showExecutivesForUser() {
			$results = $this->getAllMembersByRating();
			foreach ($results as $result) {
				$token = $result['id'];
				$token = md5($token);
				$surname = $result['surname'];
				$matNo = $result['matNo'];
				$dob = $result['dob'];
				$firstname = $result['firstname'];
				$othername = $result['othername'];
				$email = $result['email'];
				$phone = $result['phone'];
				$state_of_origin = $result['state_of_origin'];
				$profession = $result['profession'];
				$alumni_office = $result['alumni_office_id'];
				$img = $result['img'];
				$facebook_url = $result['facebook_url'];
				$twitter_url = $result['twitter_url'];
				$instagram_url = $result['instagram_url'];
				$grad_yr = $result['grad_yr'];
				if ($img == '') {
					$photo = '<img src="img/person_1.jpg" alt="Member Photo" class="img-responsive">';
				}else{
					$photo = '<img src="admin/assets/images/members/'.$img.'" alt="Member Photo" class="img-responsive">';
				}

				if ($alumni_office == 'Member') {
					continue; // skip
				}else{
					echo '<div class="col-md-3 col-sm-6">
			              <div class="probootstrap-teacher text-center probootstrap-animate">
			                <figure class="media">
			                  '.$photo.'
			                </figure>
			                <div class="text">
			                  <h3>'.$surname.' '.$firstname.' '.$othername.'</h3>
			                  <p>'.$alumni_office.'</p>
			                  <ul class="probootstrap-footer-social">
			                    <li class="twitter"><a href="'.$twitter_url.'"><i class="icon-twitter"></i></a></li>
			                    <li class="facebook"><a href="'.$facebook_url.'"><i class="icon-facebook2"></i></a></li>
			                    <li class="instagram"><a href="'.$instagram_url.'"><i class="icon-instagram2"></i></a></li>
			                  </ul>
			                </div>
			              </div>
			            </div>';
				}
			}
		}

		public function showMembersForUser() {
			$results = $this->getAllMembersByRating();
			foreach ($results as $result) {
				$token = $result['id'];
				$token = md5($token);
				$surname = $result['surname'];
				$matNo = $result['matNo'];
				$dob = $result['dob'];
				$firstname = $result['firstname'];
				$othername = $result['othername'];
				$email = $result['email'];
				$phone = $result['phone'];
				$state_of_origin = $result['state_of_origin'];
				$profession = $result['profession'];
				$alumni_office = $result['alumni_office_id'];
				$img = $result['img'];
				$facebook_url = $result['facebook_url'];
				$twitter_url = $result['twitter_url'];
				$instagram_url = $result['instagram_url'];
				$grad_yr = $result['grad_yr'];
				if ($img == '') {
					$photo = '<img src="img/person_1.jpg" alt="Member Photo" class="img-responsive">';
				}else{
					$photo = '<img src="admin/assets/images/members/'.$img.'" alt="Member Photo" class="img-responsive">';
				}

				echo '<div class="col-md-3 col-sm-6">
			              <div class="probootstrap-teacher text-center probootstrap-animate">
			                <figure class="media">
			                  '.$photo.'
			                </figure>
			                <div class="text">
			                  <h3>'.$surname.' '.$firstname.' '.$othername.'</h3>
			                  <p class="text-primary">'.$alumni_office.'</p>
			                  <p class="text-primary">Class of: '.$grad_yr.'</p>
			                  <ul class="probootstrap-footer-social">
			                    <li class="twitter"><a href="'.$twitter_url.'"><i class="icon-twitter"></i></a></li>
			                    <li class="facebook"><a href="'.$facebook_url.'"><i class="icon-facebook2"></i></a></li>
			                    <li class="instagram"><a href="'.$instagram_url.'"><i class="icon-instagram2"></i></a></li>
			                  </ul>
			                </div>
			              </div>
			            </div>';
			}
		}

		public function showMembersForAdmin() {
			$results = $this->getAllMembers();
			foreach ($results as $result) {
				$token = $result['id'];
				$token = md5($token);
				$surname = $result['surname'];
				$matNo = $result['matNo'];
				$dob = $result['dob'];
				$grad_yr = $result['grad_yr'];
				echo '<tr>
                            <td>
                              '.$surname.'
                            </td>
                            <td>
                              '.$matNo.'
                            </td>
                            <td>
                              '.$dob.'
                            </td>
                            <td>
                              '.$grad_yr.'
                            </td>
                            <td>
                              <a href="members.php?edit_member='.$token.', '.$surname.', '.$matNo.', '.$dob.', '.$grad_yr.'" class="badge badge-gradient-primary">Edit</a>
                            </td>
                            <td>
                              <a href="delete_member.php?del_member='.$token.', '.$surname.', '.$matNo.', '.$dob.', '.$grad_yr.'" class="badge badge-gradient-danger">Delete</a>
                            </td>
                          </tr>';
			}
		}		


		public function showAllPortfolioItem() {
			$results = $this->getAllPortfolio();
			foreach ($results as $result) {
				$token = $result['id'];
				$token = md5($token);
				$title = $result['title'];
				$img_src = $result['img_src'];
				$img_alt = $result['img_alt'];
				$content = $result['content'];
				$aria_labelledby = $result['aria_labelledby'];
				$data_bs_target = $result['data_bs_target'];
				$modal_id = $result['modal_id'];
				echo '<div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#'.$data_bs_target.'">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/'.$img_src.'" alt="'.$img_alt.'" />
                        </div>
                    </div>';
			}
		}

		public function showPortfolioItem() {
			$results = $this->getPortfolioByNumber();
			$sn = 0;
			$moreBtn = '<button class="btn btn-primary btn-xl" onclick="loadMore()">More</button>';
			foreach ($results as $result) {
				$token = $result['id'];
				$token = md5($token);
				$title = $result['title'];
				$img_src = $result['img_src'];
				$img_alt = $result['img_alt'];
				$content = $result['content'];
				$aria_labelledby = $result['aria_labelledby'];
				$data_bs_target = $result['data_bs_target'];
				$modal_id = $result['modal_id'];
				echo '<div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#'.$data_bs_target.'">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/'.$img_src.'" alt="'.$img_alt.'" />
                        </div>
                    </div>';
                    $sn++;
                    if ($sn > 6) {
                    	echo '<div class="col-12 text-center">'.$moreBtn.'</div>';
                    }
			}
		}

		public function showPortfolioModal() {
			$results = $this->getAllPortfolio();
			foreach ($results as $result) {
				$token = $result['id'];
				$token = md5($token);
				$title = $result['title'];
				$img_src = $result['img_src'];
				$img_alt = $result['img_alt'];
				$content = $result['content'];
				$aria_labelledby = $result['aria_labelledby'];
				$data_bs_target = $result['data_bs_target'];
				$modal_id = $result['modal_id'];
				echo '<div class="portfolio-modal modal fade" id="'.$modal_id.'" tabindex="-1" aria-labelledby="'.$aria_labelledby.'" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">'.$title.'</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/'.$img_src.'" alt="'.$img_alt.'" />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">'.$content.'</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
			}
		}

	}