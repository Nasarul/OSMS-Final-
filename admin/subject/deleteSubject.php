<?php
include('../config/dbcon.php');
// $upload_dir = '../uploads/facilitator/';

if (isset($_GET['delete'])) {
  $subject_id = $_GET['delete'];
  $sql = "SELECT * FROM tblsubject WHERE subject_id=" . $subject_id;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
 
    $sql = "DELETE FROM tblsubject WHERE subject_id=" . $subject_id;
    if (mysqli_query($conn, $sql)) {
      header('location:index.php');
    }
  }
}
?>