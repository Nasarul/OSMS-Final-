<?php
include('../config/dbcon.php');
$upload_dir = '../uploads/facilitator/';

if (isset($_GET['delete'])) {
  $facilitator_id = $_GET['delete'];
  $sql = "SELECT * FROM tblfacilitator WHERE facilitator_id=" . $facilitator_id;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $image = $row['image'];
    unlink($upload_dir . $image);
    $sql = "DELETE FROM tblfacilitator WHERE facilitator_id=" . $facilitator_id;
    if (mysqli_query($conn, $sql)) {
      header('location:index.php');
    }
  }
}
?>