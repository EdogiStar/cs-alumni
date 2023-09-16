<?php 
		include '../includes/autoLoader.php';
      session_start();
  if (isset($_SESSION['userID'])) {

    $userID = $_SESSION['userID'];

  }else{
    header("location: index.php");
  }
	$msg = '';
	if (isset($_GET['error'])) {
		$error = $_GET['error'];
		$msg = '<div class="alert alert-danger" role="alert">'.$error.'</div>';
	}

	if (isset($_GET['success'])) {
		$success = $_GET['success'];
		$msg = '<div class="alert alert-success" role="alert">'.$success.'</div>';
	}

  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Portfolio | MuqsitX</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php include 'top_nav.php'; ?>

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
       ->
      <?php include 'side_nav.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              
            </div>
            <div class="row">
                <div class="card">
                  <?php
                    if (isset($_GET['edit_portfolio'])) {
                      $edit_portfolio = $_GET['edit_portfolio'];
                      $edit_portfolio = explode(",", $edit_portfolio);
                      $token = $edit_portfolio[0];
                      $title = $edit_portfolio[1];
                      $img_src = $edit_portfolio[2];
                      $img_alt = $edit_portfolio[3];
                      $content = $edit_portfolio[4];
                      $modal_id = $edit_portfolio[5];  
                      $data_bs_target = $modal_id;
                      $aria_labelledby = $modal_id;

                      $portfolioObj = new PortfolioContr($title, $img_src, $img_alt, $content, $aria_labelledby, $data_bs_target, $modal_id);
                      $result = $portfolioObj->showPortfolioRecord($token);
                      foreach($result as $results){
                        $results['title'];
                        $results['img_src'];
                        $results['img_alt'];
                        $results['content'];
                        $results['modal_id'];
                      }
                  ?>
                  <div class="card-body">
                    <h4 class="card-title">Edit Portfolio</h4>
                    <p class="card-description">Edit an existing portfolio</p>
                    <form class="forms-sample" method="post" action="../includes/edit_portfolio.php" enctype="multipart/form-data">
                    	<?php echo $msg; ?>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                          <input type="text" name="edit_title" class="form-control" id="exampleInputUsername2" value="<?php echo $results['title']; ?>">
                          <input type="hidden" name="token" class="form-control" id="exampleInputUsername2" value="<?php echo $results['id']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                          <input type="file" name="edit_img_src" class="form-control" id="exampleInputUsername2" value="<?php echo $results['img_src']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Image Alt</label>
                        <div class="col-sm-9">
                          <input type="text" name="edit_img_alt" class="form-control" id="exampleInputUsername2" value="<?php echo $results['img_alt']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Portfolio ID</label>
                        <div class="col-sm-9">
                          <input type="text" name="edit_modal_id" class="form-control" id="exampleInputUsername2" value="<?php echo $results['modal_id']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Content</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" id="message" name="edit_content" type="text" style="height: 10rem" data-sb-validations="required"><?php echo $results['content']; ?></textarea>
                        </div>
                      </div>
                      <button type="submit" name="new_portfolio_btn" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="portfolio.php" class="btn btn-gradient-primary me-2">Cancel</a>
                    </form>
                  </div>
                <?php 
                  }else{ 
                ?>
                  <div class="card-body">
                    <h4 class="card-title">Add New Portfolio</h4>
                    <p class="card-description">Add new portfolio to your collection </p>
                    <form class="forms-sample" method="post" action="../includes/portfolio.php" enctype="multipart/form-data">
                      <?php echo $msg; ?>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                          <input type="text" name="title" class="form-control" id="exampleInputUsername2" placeholder="Design of Web">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                          <input type="file" name="img_src" class="form-control" id="exampleInputUsername2" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Image Alt</label>
                        <div class="col-sm-9">
                          <input type="text" name="img_alt" class="form-control" id="exampleInputUsername2" placeholder="Log Cabin, ....">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Portfolio ID</label>
                        <div class="col-sm-9">
                          <input type="text" name="modal_id" class="form-control" id="exampleInputUsername2" placeholder="Create Portfolio ID">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Content</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" id="message" name="content" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                        </div>
                      </div>
                      
                      <button type="submit" name="portfolio_btn" class="btn btn-gradient-primary me-2">Submit</button>
                    </form>
                  </div>
                  <?php } ?>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Existing Portfolio</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Name </th>
                            <th> ID </th>
                            <th colspan="2"> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$skillObj = new PortfolioView();
                        		$skillObj->showAdminPortfolio();
                        	?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © MuqsitX ~ 2016 - <?php echo date('Y'); ?></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>