<?php

	$conn = mysqli_connect("localhost","root","","napd_olms") or die("Connection failed");

	if($_POST['type'] == ""){
		$sql = "SELECT * FROM tblcourse";
		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");
		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['course_id']}'>{$row['course_name']}</option>";
		}
	}else if($_POST['type'] == "subjectData"){

		$sql = "SELECT * FROM tblsubject WHERE course_id = {$_POST['id']}";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['subject_id']}'>{$row['subject_name']}</option>";
		}
	}

	echo $str;
 ?>
