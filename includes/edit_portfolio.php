<?php 
	
	if (isset($_POST['new_portfolio_btn'])) {
		
		$title = $_POST['edit_title'];
		$token = $_POST['token'];
		$token = md5($token);

		// $img_src = $_FILES['edit_img_src']['name'];
		$img_alt = $_POST['edit_img_alt'];
		$content = $_POST['edit_content'];
		$modal_id = $_POST['edit_modal_id'];
		$aria_labelledby = $modal_id;
		$data_bs_target = $modal_id;

		$fileName=$_FILES['edit_img_src']['name'];
		$fileTmpName=$_FILES['edit_img_src']['tmp_name'];
		$fileSize=$_FILES['edit_img_src']['size'];
		$fileError=$_FILES['edit_img_src']['error'];
		$fileType=$_FILES['edit_img_src']['type'];

		//SET FILE IMAGE TO 900 X 650

		$fileExt=explode(".", $fileName);
		$fileActualExt=strtolower(end($fileExt));
		$fileActualName = $fileExt[0];

			if ($fileError===0) {
				$fileNameNew = $fileActualName .'.'. $fileActualExt;
				$fileDestination='../assets/img/portfolio/'.$fileNameNew;
				$upload = move_uploaded_file($fileTmpName, $fileDestination);
				if ($upload) {
							// controller classes
				include '../classes/dbh.php';
				include '../classes/portfolio.php';
				include '../classes/PortfolioContr.php';
				$portfolioObj = new PortfolioContr($title, $fileNameNew, $img_alt, $content, $aria_labelledby, $data_bs_target, $modal_id);
				$portfolioObj->updatePortfolio($token);
			}else{
				$error = 'Upload Failed, try another image';
				header('location: ../admin/portfolio.php?error='.$error);
			}
		}else{
				$error = 'Upload Failed, try another image';
				header('location: ../admin/portfolio.php?error='.$error);				
			}
		
	}
	