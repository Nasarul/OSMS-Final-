<?php
include('../config/dbcon.php');
$upload_dir = 'admin/uploads/trainee/';

if (isset($_GET['delete'])) {
  $trainee_id = $_GET['delete'];
  $sql = "SELECT * FROM tbltrainee WHERE trainee_id=" . $trainee_id;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $image = $row['image'];
    unlink($upload_dir . $image);
    $sql = "DELETE FROM tbltrainee WHERE trainee_id=" . $trainee_id;
    if (mysqli_query($conn, $sql)) {
      header('location:index.php');
    }
  }
}
?>