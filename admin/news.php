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
    <title>News | CS ALUMNI IBBUL</title>
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
                </span> News
              </h3>
              
            </div>
            <div class="row">
                <div class="card">
                  <?php
                    if (isset($_GET['edit_news'])) {
                      $edit_skill = $_GET['edit_news'];
                      $edit_skill = explode(",", $edit_skill);
                      $token = $edit_skill[0];
                      $news_title = $edit_skill[1];
                      $news_date = $edit_skill[2];
                      $news_img = $edit_skill[3];
                      $news_desc = $edit_skill[4];
                      $viewSkillObj = new NewsContr($news_title, $news_date, $news_img, $news_desc);
                      $result = $viewSkillObj->showNewsRecord($token);
                      foreach($result as $results){
                        $results['news_id'];
                        $results['news_title'];
                        $results['news_date'];
                        $results['news_img'];
                        $results['news_desc'];
                      }
                  ?>
                  <div class="card-body">
                    <h4 class="card-title">Edit News</h4>
                    <p class="card-description">Edit an existing News</p>
                    <form class="forms-sample" method="post" action="../includes/edit_news.php" enctype="multipart/form-data">
                    	<?php echo $msg; ?>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">News Title</label>
                        <div class="col-sm-9">
                          <input type="text" name="new_news_title" class="form-control" id="exampleInputUsername2" value="<?php echo $results['news_title']; ?>">
                          <input type="hidden" name="token" class="form-control" id="exampleInputUsername2" value="<?php echo $results['news_id']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">News Date</label>
                        <div class="col-sm-9">
                          <input type="date" name="new_news_date" class="form-control" id="exampleInputUsername2" value="<?php echo $results['news_date']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">News Photo</label>
                        <div class="col-sm-9">
                          <input type="file" name="new_img_src" class="form-control" id="exampleInputUsername2" value="<?php echo $results['news_img']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">News Description</label>
                        <div class="col-sm-9">
                          <input type="text" name="new_news_desc" class="form-control" id="exampleInputUsername2" value="<?php echo $results['news_desc']; ?>">
                        </div>
                      </div>
                      <button type="submit" name="new_news_btn" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="news.php" class="btn btn-gradient-primary me-2">Cancel</a>
                    </form>
                  </div>
                <?php 
                  }else{ 
                ?>
                  <!-- ////////////////// -->
                  <?php
                    if (isset($_GET['read_news'])) {
                      $read_news = $_GET['read_news'];
                      $edit_skill = explode(",", $read_news);
                      $token = $edit_skill[0];
                      $news_title = $edit_skill[1];
                      $news_date = $edit_skill[2];
                      $news_img = $edit_skill[3];
                      $news_desc = $edit_skill[4];
                      $viewSkillObj = new NewsContr($news_title, $news_date, $news_img, $news_desc);
                      $result = $viewSkillObj->showNewsRecord($token);
                      foreach($result as $results){
                        $results['news_id'];
                        $results['news_title'];
                        $results['news_date'];
                        $results['news_img'];
                        $results['news_desc'];
                      }
                  ?>
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $results['news_title']; ?></h4>
                    <p class="card-description"><b>Date: </b><?php echo $results['news_date']; ?></p>
                    <img src="assets/images/news/<?php echo $results['news_img']; ?>" alt="News Photo" width="300px" height="300px">
                    <p class="card-description"><?php echo $results['news_desc']; ?></p>    
                  </div>
                <?php 
                  }else{ 
                ?>
                  <div class="card-body">
                    <h4 class="card-title">Add News</h4>
                    <p class="card-description">Post news here </p>
                    <form class="forms-sample" method="post" action="../includes/news.php"  enctype="multipart/form-data">
                      <?php echo $msg; ?>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">News Title</label>
                        <div class="col-sm-9">
                          <input type="text" name="news_title" class="form-control" id="exampleInputUsername2" placeholder="Convocation ceremony ...">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">News Date</label>
                        <div class="col-sm-9">
                          <input type="date" name="news_date" class="form-control" id="exampleInputUsername2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">News Photo</label>
                        <div class="col-sm-9">
                          <input type="file" name="img_src" class="form-control" id="exampleInputUsername2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">News Description</label>
                        <div class="col-sm-9">
                          <textarea name="news_desc" class="form-control" id="exampleInputUsername2" placeholder="Type full details here..." rows="10"></textarea>
                        </div>
                      </div>
                      <button type="submit" name="news_btn" class="btn btn-gradient-primary me-2">Submit</button>
                    </form>     
                  </div>
                  <?php } ?>
                  <!-- ////////////////////////// -->
                  <?php } ?>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Existing News</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Title </th>
                            <th colspan="2"> Actions </th>
                          </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$skillObj = new NewsView();
                        		$skillObj->showAdminNews();
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