<?php 
	if (isset($_GET['del_news'])) {
		$del_news = $_GET['del_news'];
	      $del_news = explode(",", $del_news);
	      $token = $del_news[0];
	      $news_title = $del_news[1];
	      $news_date = $del_news[2];
	      $news_img = $del_news[3];
	      $news_desc = $del_news[4];

		// controller classes
		include '../classes/dbh.php';
		include '../classes/news.php';
		include '../classes/NewsContr.php';
		
		$contact = new NewsContr($news_title, $news_date, $news_img, $news_desc);

		$contact->deleteNews($token);
	}
?>

