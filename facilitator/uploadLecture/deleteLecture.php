<?php
include('../config/dbcon.php');
$upload_dir = '../uploads/lecture/';

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $sql = "SELECT * FROM tbluploadlecture WHERE upload_lecture_id=" . $id;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // $image = $row['image'];
    // unlink($upload_dir . $image);
    $sql = "DELETE FROM tbluploadlecture WHERE upload_lecture_id=" . $id;
    if (mysqli_query($conn, $sql)) {
      header('location:index.php');
    }
  }
}
?>