<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'napd_olms');

$sql = "SELECT * FROM tblsubject";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file

    $course = $_POST['course_name'];
	$name = $_POST['name'];
	$code = $_POST['code'];
    $filename = $_FILES['lecture']['name'];

    // $lecture = $_FILES['lecture']['name'];
	// $lecture_type = $_FILES['lecture']['type'];
	// $lecture_size = $_FILES['lecture']['size'];
	// $lecture_temp_loc = $_FILES['lecture']['tmp_name'];
	// $lecture_store = "../uploads/lecture/" . $lecture;
	// move_uploaded_file($lecture_temp_loc, $lecture_store);

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file_type = $_FILES['lecture']['type'];
    $size = $_FILES['lecture']['size'];
    $file = $_FILES['lecture']['tmp_name'];
   
    

    if (!in_array($extension, ['jpg','zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['lecture']['size'] > 9999999999999000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO tblsubject (course_name, name, code, lecture) VALUES ('$course', '$name', '$code', '$filename')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}

// Downloads files
if (isset($_GET['sub_id'])) {
    $id = $_GET['sub_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM tblsubject WHERE sub_id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        // $newCount = $file['downloads'] + 1;
        // $updateQuery = "UPDATE tblsubject SET downloads=$newCount WHERE id=$id";
        // mysqli_query($conn, $updateQuery);
        exit;
    }

}