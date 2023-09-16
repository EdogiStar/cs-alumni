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
    <title>Social Links | MuqsitX</title>
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
            
            <?php 
              if (isset($_GET['edit_link'])) {
                $edit_link = $_GET['edit_link'];
                $edit_link = explode(",", $edit_link);
                $token = $edit_link[0];
                $href = $edit_link[1];
                $icon = $edit_link[2];
                $socialLinkObj = new SocialLinksContr($href, $icon);
                $result = $socialLinkObj->showSocialLink($token);
                 foreach($result as $results){
                        $href = $results['link_href'];
                        $icon = $results['link_icon'];
                        $token = $results['link_id'];
                      }
                
            ?>
             <div class="row mt-3">
              <div class="col-12 grid-margin">
                <div class="card">
            <div class="card-body">
                    <h4 class="card-title">Edit Social Link</h4>
                    <p class="card-description">Edit an existing link</p>
                    <form class="forms-sample" method="post" action="../includes/edit_link.php">
                      <?php echo $msg; ?>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Link Url</label>
                        <div class="col-sm-9">
                          <input type="text" name="new_link_name" class="form-control" id="exampleInputUsername2" value="<?php echo $href; ?>">
                          <input type="hidden" name="token" class="form-control" id="exampleInputUsername2" value="<?php echo $token; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Link Icon</label>
                        <div class="col-sm-9">
                          <input type="text" name="new_link_icon" class="form-control" id="exampleInputUsername2" value="<?php echo $icon; ?>">
                        </div>
                      </div>
                      <button type="submit" name="new_link_btn" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="social.php" class="btn btn-gradient-primary me-2">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          <?php }else{ ?>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add New Social Link</h4>
                    <form class="forms-sample" method="post" action="../includes/new_link.php">
                      <?php echo $msg; ?>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Link Href</label>
                        <div class="col-sm-9">
                          <input type="text" name="href" class="form-control" id="exampleInputUsername2" placeholder="Href">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Link Icon</label>
                        <div class="col-sm-9">
                          <input type="text" name="icon" class="form-control" id="exampleInputUsername2" placeholder="Icon">
                        </div>
                      </div>
                      <button type="submit" name="new_skill_btn" class="btn btn-gradient-primary me-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

               <div class="row mt-3">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Existing Social Links</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Href </th>
                            <th> Icon </th>
                            <th colspan="2"> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $socialLinkObj = new SocialLinksView();
                            $socialLinkObj->showAdminSocialLinks();
                          ?>
                        </tbody>
                      </table>
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