<?php
  require('../config/dbcon.php');

  if (isset($_POST['Submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];

    if(empty($name)){
			$errorMsg = 'Please input name..';	
		}elseif(empty($email)){
			$errorMsg = 'Please input email..';
		}

		if(!isset($errorMsg)){
			$sql = "INSERT INTO stuusers(name, email)
					values('".$name."', '".$email."')";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record added successfully';
				header('Location: index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}
  }
