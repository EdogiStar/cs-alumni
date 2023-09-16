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
    <title>Gallery | CS ALUMNI IBBUL</title>
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
                </span> Gallery
              </h3>
              
            </div>
            <div class="row">
                <div class="card">
                  <?php
                    if (isset($_GET['edit_gallery'])) {
                      $edit_gallery = $_GET['edit_gallery'];
                      $edit_gallery = explode(",", $edit_gallery);
                      $token = $edit_gallery[0];
                      $caption = $edit_gallery[1];
                      $img_src = $edit_gallery[2];
                      
                      $portfolioObj = new GalleryContr($caption, $img_src);
                      $result = $portfolioObj->showGalleryRecord($token);
                      foreach($result as $results){
                        $results['caption'];
                        $results['img_src'];
                        $results['gallery_id'];
                      }
                  ?>
                  <div class="card-body">
                    <h4 class="card-title">Edit Gallery</h4>
                    <p class="card-description">Edit an existing Photo</p>
                    <form class="forms-sample" method="post" action="../includes/edit_gallery.php" enctype="multipart/form-data">
                    	<?php echo $msg; ?>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Caption</label>
                        <div class="col-sm-9">
                          <input type="text" name="edit_caption" class="form-control" id="exampleInputUsername2" value="<?php echo $results['caption']; ?>">
                          <input type="hidden" name="token" class="form-control" id="exampleInputUsername2" value="<?php echo $results['gallery_id']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-sm-9">
                          <input type="file" name="edit_img_src" class="form-control" id="exampleInputUsername2" value="<?php echo $results['img_src']; ?>">
                        </div>
                      </div>
                      <button type="submit" name="new_gallery_btn" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="gallery.php" class="btn btn-gradient-primary me-2">Cancel</a>
                    </form>
                  </div>
                <?php 
                  }else{ 
                ?>
                  <div class="card-body">
                    <h4 class="card-title">Add To Gallery</h4>
                    <p class="card-description">Add new portfolio to your collection </p>
                    <form class="forms-sample" method="post" action="../includes/gallery.php" enctype="multipart/form-data">
                      <?php echo $msg; ?>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Caption</label>
                        <div class="col-sm-9">
                          <input type="text" name="caption" class="form-control" id="exampleInputUsername2" placeholder="Design of Web">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-sm-9">
                          <input type="file" name="img_src" class="form-control" id="exampleInputUsername2" >
                        </div>
                      </div>
                      
                      <button type="submit" name="gallery_btn" class="btn btn-gradient-primary me-2">Submit</button>
                    </form>
                  </div>
                  <?php } ?>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-12 grid-margin">
                <div class="card">
                  <h4 class="card-title">Existing Photos</h4>
                  <div class="card-body" style="display: flex;">
                          <?php 
                            $skillObj = new GalleryView();
                            $skillObj->showAdminGallery();
                          ?>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
             <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © <img src="assets/images/logo2.png"> ~ 2023 - <?php echo date('Y'); ?></span>
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