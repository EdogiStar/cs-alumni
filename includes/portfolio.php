<?php 
	
	if (isset($_POST['portfolio_btn'])) {
		
		$title = $_POST['title'];
		$img_alt = $_POST['img_alt'];
		$content = $_POST['content'];
		$modal_id = $_POST['modal_id'];
		$aria_labelledby = $modal_id;
		$data_bs_target = $modal_id;
		
		$fileName=$_FILES['img_src']['name'];
		$fileTmpName=$_FILES['img_src']['tmp_name'];
		$fileSize=$_FILES['img_src']['size'];
		$fileError=$_FILES['img_src']['error'];
		$fileType=$_FILES['img_src']['type'];

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
					$portfolioObj->setNewPortfolio();
				}else{
					$error = 'Upload Failed, try another image';
					header('location: ../admin/portfolio.php?error='.$error);
				}
		}else{
					$error = 'Upload Failed, try another image';
					header('location: ../admin/portfolio.php?error='.$error);
				}


		
	}
	