<?php
  include 'includes/autoLoader.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News - CS ALUMNI IBBUL</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

      <?php include 'header.php'; ?>
    
      <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate">
              <h1>News</h1>
            </div>
          </div>
        </div>
      </section>
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
      <section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-flex-block">
                <div class="probootstrap-text probootstrap-animate">
                  <div class="text-uppercase probootstrap-uppercase">Featured News</div>
                  <h3><?php echo $results['news_title'];?></h3>
                  <p><?php echo $results['news_desc'];?></p>
                  <p>
                    <span class="probootstrap-date"><i class="icon-calendar"></i><?php echo $results['news_date'];?></span>
                    <span class="probootstrap-location"><i class="icon-user2"></i>By Admin</span>
                  </p>
                  <!-- <p><a href="#" class="btn btn-primary">Learn More</a></p> -->
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <p><a href="news.php" class="btn btn-primary">View all news</a></p>  
                    </div>
                  </div>
                </div>
                <div class="probootstrap-image probootstrap-animate" style="background-image: url(admin/assets/images/news/<?php echo $results['news_img']; ?>)">
                  <!-- <a href="https://vimeo.com/45830194" class="btn-video popup-vimeo"><i class="icon-play3"></i></a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <?php
        }else{
      ?>

      <section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <?php 
              $skillObj = new NewsView();
              $skillObj->showAllUserNews();
            ?>
            <div class="clearfix visible-sm-block visible-xs-block"></div>
          </div>

        </div>
      </section>
      <?php } ?>
      <?php include 'footer.php'; ?>

    </div>
    <!-- END wrapper -->
    

    <script src="js/scripts.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/custom.js"></script>

  </body>
</html>