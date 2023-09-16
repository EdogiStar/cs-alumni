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
    <title>Senate List | CS ALUMNI IBBUL</title>
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
                </span> Senate List
              </h3>
              
            </div>
            <div class="row">
                <div class="card">
                  <?php
                    if (isset($_GET['edit_member'])) {
                      $edit_member = $_GET['edit_member'];
                      $edit_member = explode(",", $edit_member);
                      $token = $edit_member[0];
                      $surname = $edit_member[1];
                      $matNo = $edit_member[2];
                      $dob = $edit_member[3];
                      $grad_yr = $edit_member[4];
                      
                      $portfolioObj = new MembersContr($surname, $matNo, $dob, $grad_yr);
                      $result = $portfolioObj->showMemberRecord($token);
                      foreach($result as $results){
                        $results['id'];
                        $results['surname'];
                        $results['matNo'];
                        $results['dob'];
                        $results['grad_yr'];
                      }
                  ?>
                  <div class="card-body">
                    <h4 class="card-title">Edit Record</h4>
                    <p class="card-description">Edit an existing Record</p>
                    <form class="forms-sample" method="post" action="../includes/edit_member.php">
                    	<?php echo $msg; ?>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Surname</label>
                        <div class="col-sm-9">
                          <input type="text" name="edit_surname" class="form-control" id="exampleInputUsername2" value="<?php echo $results['surname']; ?>">
                          <input type="hidden" name="token" class="form-control" id="exampleInputUsername2" value="<?php echo $results['id']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Matriculation Number</label>
                        <div class="col-sm-9">
                          <input type="text" name="edit_MatNo" class="form-control" id="exampleInputUsername2" value="<?php echo $results['matNo']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Date of Birth</label>
                        <div class="col-sm-9">
                          <input type="date" name="edit_dob" class="form-control" id="exampleInputUsername2" value="<?php echo $results['dob']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Date of Graduation</label>
                        <div class="col-sm-9">
                          <select name="edit_grad_yr" class="form-control">
                            <option value="" class="bg-primary"><?php  echo '<option value="'.$grad_yr.'">'.$grad_yr.'</option>'; ?></option>
                            <?php
                              $startYear = 2004;
                              $endYear = date('Y');
                              for($i = $startYear; $i < $endYear; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <button type="submit" name="new_member_btn" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="members.php" class="btn btn-gradient-primary me-2">Cancel</a>
                    </form>
                  </div>
                <?php 
                  }else{ 
                ?>
                  <div class="card-body">
                    <h4 class="card-title">Add New Graduate To Senate List</h4>
                    <p class="card-description">Add a single user</p>
                    <form class="forms-sample" method="post" action="../includes/member.php">
                      <?php echo $msg; ?>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Surname</label>
                        <div class="col-sm-9">
                          <input type="text" name="surname" class="form-control" id="exampleInputUsername2" placeholder="John">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Matriculation Number</label>
                        <div class="col-sm-9">
                          <input type="text" name="matNo" class="form-control" id="exampleInputUsername2" placeholder="U17/FNS/CSC/0001">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Date of Birth</label>
                        <div class="col-sm-9">
                          <input type="date" name="dob" class="form-control" id="exampleInputUsername2" placeholder="01/01/2000">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Graduation Year</label>
                        <div class="col-sm-9">
                          <select name="grad_yr" class="form-control">
                            <option value="" class="bg-primary">Select Year</option>
                            <?php
                              $startYear = 2004;
                              $endYear = date('Y');
                              for($i = $startYear; $i < $endYear; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <button type="submit" name="member_btn" class="btn btn-gradient-primary me-2">Submit</button>
                    </form>
                  </div>
                  <?php } ?>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-12 grid-margin">
                <div class="card">
                  <h4 class="card-title">Existing Names on Senate List</h4>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Surname </th>
                            <th> Matric Number </th>
                            <th> Date of Birth </th>
                            <th> Graduation </th>
                            <th colspan="2"> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $skillObj = new MembersView();
                            $skillObj->showMembersForAdmin();
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