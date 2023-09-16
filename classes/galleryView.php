<?php 

	class GalleryView extends Gallery {

		
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
		
		public function showUserGallery() {
			$results = $this->getAllGallery();
			foreach ($results as $result) {
				$token = $result['gallery_id'];
				$token = md5($token);
				$caption = $result['caption'];
				$img_src = $result['img_src'];
				
				echo '<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="grid-item probootstrap-animate">
	                  <a href="admin/assets/images/gallery/'.$img_src.'" itemprop="contentUrl" data-size="1000x632">
	                    <img src="admin/assets/images/gallery/'.$img_src.'" itemprop="thumbnail" alt="Gallery Photo" />
	                  </a>
	                  <figcaption itemprop="caption description">'.$caption.'</figcaption>
	                </figure>';
			}
		}

		public function showAdminGallery() {
			$results = $this->getAllGallery();
			foreach ($results as $result) {
				$token = $result['gallery_id'];
				$token = md5($token);
				$caption = $result['caption'];
				$img_src = $result['img_src'];
				
				echo '<div style="margin: 5px;border:1px dotted black;text-align:center">
                              <img src="assets/images/gallery/'.$img_src.'" width="200px" height="150px"><br>
                              '.$caption.' <br><br>
                              <a href="gallery.php?edit_gallery='.$token.', '.$caption.', '.$img_src.'" class="badge badge-gradient-success">Edit</a>
                              <a href="delete_gallery.php?del_gallery='.$token.', '.$caption.', '.$img_src.'" class="badge badge-gradient-danger">Delete</a>
                           </div>';
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