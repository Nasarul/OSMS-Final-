<?php
require_once('../config/dbcon.php');

if (isset($_POST['Submit'])) {
	$course = $_POST['course_id'];
	$subject = $_POST['subject_id'];
	$facilitator = $_POST['facilitator_id'];
	$lecture_name = $_POST['lecture_name'];
	
	$lecture_file = $_FILES['lecture_file']['name'];
	$lecture_type = $_FILES['lecture_file']['type'];
	$lecture_size = $_FILES['lecture_file']['size'];
	$lecture_temp_loc = $_FILES['lecture_file']['tmp_name'];
	$lecture_store = "../uploads/lecture/" . $lecture_file;
	move_uploaded_file($lecture_temp_loc, $lecture_store);

	// $lecture_video = $_FILES['lecture_video']['name'];
	// $lecture_video_type = $_FILES['lecture_video']['type'];
	// $lecture_video_size = $_FILES['lecture_video']['size'];
	// $lecture_video_temp_loc = $_FILES['lecture_video']['tmp_name'];
	// $lecture_video_store = "../uploads/video/" . $lecture_video;
	// move_uploaded_file($lecture_video_temp_loc, $lecture_video_store);

	if (empty($course)) {
		$errorMsg = 'Please input course Name...';
	} elseif (empty($subject)) {
		$errorMsg = 'Please input subject name..';
	} elseif (empty($facilitator)) {
		$errorMsg = 'Please input facilitator name..';
	} elseif (empty($lecture_name)) {
		$errorMsg = 'Please input lecture name..';
	} elseif (empty($lecture_file)) {
		$errorMsg = 'Please input lecture file..';
	} else {

		if (!isset($errorMsg)) {
			$sql = "INSERT INTO tbluploadlecture(course_id, subject_id, facilitator_id, lecture_name, lecture_file)
					values('" . $course . "','" . $subject . "', '" . $facilitator . "','" . $lecture_name . "', '" . $lecture_file . "')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$successMsg = 'New record added successfully';
				header('Location: index.php');
			} else {
				$errorMsg = 'Error ' . mysqli_error($conn);
			}
		}
	}
}
