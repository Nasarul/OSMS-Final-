<?php
require_once('../config/dbcon.php');

if (isset($_POST['Submit'])) {
	$course_name = $_POST['course_name'];
	$duration = $_POST['duration'];

	if (empty($course_name)) {
		$errorMsg = 'Please input course name..';
	} elseif (empty($duration)) {
		$errorMsg = 'Please input duration..';
	} else {

		if (!isset($errorMsg)) {
			$sql = "INSERT INTO tblcourse(course_name, duration)
					values('" . $course_name . "', '" . $duration . "')";
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
?>