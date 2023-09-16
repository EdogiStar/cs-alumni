<?php 
	if (isset($_GET['del_portfolio'])) {
		$del_portfolio = $_GET['del_portfolio'];
		$del_portfolio = explode(",", $del_portfolio);
		$token = $del_portfolio[0];
		$title = $del_portfolio[1];
		$img_src = $del_portfolio[2];
		$img_alt = $del_portfolio[3];
		$content = $del_portfolio[4];
		$modal_id = $del_portfolio[5];

		$aria_labelledby = $modal_id;
		$data_bs_target = $modal_id;

		// controller classes
		include '../classes/dbh.php';
		include '../classes/portfolio.php';
		include '../classes/PortfolioContr.php';
		$portfolioObj = new PortfolioContr($title, $img_src, $img_alt, $content, $aria_labelledby, $data_bs_target, $modal_id);

		$portfolioObj->deletePortfolio($token);
	}
?>

