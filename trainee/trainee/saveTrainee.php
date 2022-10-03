<?php
  require_once('../config/dbcon.php');
  $upload_dir = 'admin/uploads/trainee/';

  if (isset($_POST['Submit'])) {
   	$trainee_roll = $_POST['trainee_roll'];
	$trainee_name = $_POST['trainee_name'];
	$designation = $_POST['designation'];
	$organization = $_POST['organization'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$dob = date('Y-m-d', strtotime($_POST['dob'])); 
	$bg = $_POST['bg']; 
    $imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];

    if(empty($trainee_roll)){
			$errorMsg = 'Please input trainees rool..';
		}elseif(empty($trainee_name)){
			$errorMsg = 'Please input trainee name..';	
		}elseif(empty($designation)){
			$errorMsg = 'Please input designation..';
		}elseif(empty($organization)){
			$errorMsg = 'Please input organization..';	
		}elseif(empty($email)){
			$errorMsg = 'Please input email..';
		}elseif(empty($mobile)){
			$errorMsg = 'Please input mobile..';
		}elseif(empty($dob)){
			$errorMsg = 'Please input date of birth..';
		}elseif(empty($bg)){
			$errorMsg = 'Please input blood group..';
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
			$sql = "INSERT INTO tbltrainee(trainee_roll, trainee_name, designation, organization, email, mobile, dob, bg, image)
					values('".$trainee_roll."','".$trainee_name."', '".$designation."', '".$organization."', '".$email."', '".$mobile."', '".$dob."', '".$bg."','".$userPic."')";
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