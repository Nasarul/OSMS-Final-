<?php
  require_once('../config/dbcon.php');
  $upload_dir = '../uploads/facilitator/';

  if (isset($_POST['Submit'])) {
    $facilitator_name = $_POST['facilitator_name'];
	$designation = $_POST['designation'];
	$organization = $_POST['organization'];
    $email = $_POST['email'];
	$mobile = $_POST['mobile'];
    
    $imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];

    if(empty($facilitator_name)){
			$errorMsg = 'Please input facilitator name..';
		}elseif(empty($designation)){
			$errorMsg = 'Please input designation..';
		}elseif(empty($organization)){
			$errorMsg = 'Please input organization..';	
		}elseif(empty($email)){
			$errorMsg = 'Please input email..';
		}elseif(empty($mobile)){
			$errorMsg = 'Please input mobile..';
		}else{

			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

			$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

			if(in_array($imgExt, $allowExt)){

				if($imgSize < 5000000){
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}


		if(!isset($errorMsg)){
			$sql = "INSERT INTO tblfacilitator(facilitator_name, designation, organization, email, mobile, image)
					values('".$facilitator_name."', '".$designation."', '".$organization."', '".$email."', '".$mobile."', '".$userPic."')";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record added successfully';
				header('Location: index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}
  }
?>