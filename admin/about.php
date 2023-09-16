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
    <title>About | CS ALUMNI IBBUL</title>
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
                </span> About
              </h3>
            </div>
            
            <?php 
              if (isset($_GET['edit_about'])) {
                $edit_about = $_GET['edit_about'];
                $edit_about = explode(",", $edit_about);
                $token = $edit_about[0];
                $content1 = $edit_about[1];
                $content2 = $edit_about[2];
                $aboutObj = new AboutContr($content1, $content2);
                $result = $aboutObj->showAboutRecord($token);
                  foreach($result as $results){
                    $results['about_content1'];
                    $results['about_content2'];
                  }
            ?>
            <div class="row mt-3">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit About</i></h4>
                    <div class="text-success text-uppercase mt-3">                        
                    <form class="forms-sample" method="post" action="../includes/edit_about.php">
                      <?php echo $msg; ?>

                       <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Content 1</label>
                        <div class="col-sm-9">
                          <input type="hidden" name="token" value="<?php echo $token; ?>">
                          <textarea class="form-control" id="message" name="new_content1" type="text" style="height: 10rem" data-sb-validations="required"><?php echo $results['about_content1']; ?></textarea>
                        </div>
                      </div>

                       <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Content 2</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" id="message" name="new_content2" type="text" style="height: 10rem" data-sb-validations="required"><?php echo $results['about_content2']; ?></textarea>
                        </div>
                      </div>
                      <button type="submit" name="new_about_btn" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="about.php" class="btn btn-gradient-primary me-2">Cancel</a>
                    </form>
                  </div>


                    </div>

                  </div>
                </div>
              
          <?php }else{ ?>
               <div class="row mt-3">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">About</h4>
                    <div class="table-responsive">
                          <?php 
                            $aboutObj = new AboutView();
                            $aboutObj->showAdminAbout();
                          ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

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