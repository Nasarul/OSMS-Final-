<?php
include("../config/dbcon.php");

if (isset($_GET['upload_lecture_id'])) {
  $id = $_GET['upload_lecture_id'];

  // fetch file to download from database
  $sql = "SELECT * FROM tbluploadlecture WHERE upload_lecture_id=$id";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);
  $filepath = '../../admin/uploads/lecture/' . $row['lecture_file'];

  // Process download
  if (file_exists($filepath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    flush(); // Flush system output buffer
    readfile($filepath);
    die();
  } else {
    http_response_code(404);
    die();
  }
} else {
  die("Invalid file name!");
}

?>

