<?php
include('../config/dbcon.php');

if (isset($_POST['Submit'])) {
	// $course_name = $_POST['course_id'];
	$course_id = $_POST['abcd'];
	$code = $_POST['code'];
	$subject_name = $_POST['subject_name'];

	if (empty($course_id)) {
		$errorMsg = 'Please input course ID..';
	} elseif (empty($code)) {
		$errorMsg = 'Please input subject code..';
	} elseif (empty($subject_name)) {
		$errorMsg = 'Please input subject name..';
	} else {

		if (!isset($errorMsg)) {
			$sql = "INSERT INTO tblsubject(course_id, code, subject_name)
					values($course_id ,'" . $code . "','" . $subject_name . "')";
	
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
