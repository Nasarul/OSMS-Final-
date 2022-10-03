<?php
require_once('../config/dbcon.php');
$upload_dir = '../uploads/lecture/';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM tbluploadlecture WHERE upload_lecture_id =" . $id;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    $errorMsg = 'Could not find any record';
  }
}

if (isset($_POST['Submit'])) {
  $course_id = $_POST['course_id'];
  $subject_id = $_POST['subject_id'];
  $facilitator_id = $_POST['facilitator_id'];
  $lecture_name = $_POST['lecture_name'];

  $lecture_file = $_FILES['lecture_file']['name'];
  $lecture_type = $_FILES['lecture_file']['type'];
  $lecture_size = $_FILES['lecture_file']['size'];
  $lecture_temp_loc = $_FILES['lecture_file']['tmp_name'];
  $lecture_store = "../uploads/lecture/" . $lecture_file;
  move_uploaded_file($lecture_temp_loc, $lecture_store);

  // test fatal case start ??

  // if ($lecture) {

  //   $imgExt = strtolower(pathinfo($lecture, PATHINFO_EXTENSION));

  //   $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

  //   $userfile = time() . '_' . rand(1000, 9999) . '.' . $imgExt;

  //   if (in_array($imgExt, $allowExt)) {

  //     if ($imgSize < 90000000000000000) {
  //       unlink($upload_dir . $row['lecture']);
  //       move_uploaded_file($lecture_temp_loc, $lecture_store);
  //     } else {
  //       $errorMsg = 'file too large';
  //     }
  //   } else {
  //     $errorMsg = 'Please select a valid image';
  //   }
  // } else {
  //   $userfile = $row['lecture'];
  // }
  // test fatal case end ??

  if (!isset($errorMsg)) {
    if (empty($lecture_file)) {
      $sql = "UPDATE tbluploadlecture
  SET lecture_name = '" . $lecture_name . "'
WHERE	upload_lecture_id=" . $id;
    } else {
      $sql = "UPDATE tbluploadlecture
									SET lecture_name = '" . $lecture_name . "',
                  lecture_file = '" . $lecture_file . " '
				WHERE	upload_lecture_id=" . $id;
    }

    $result = mysqli_query($conn, $sql);
    if ($result) {
      $successMsg = 'New record updated successfully';
      header('Location: index.php');
    } else {
      $errorMsg = 'Error ' . mysqli_error($conn);
    }
  }
}

?>

<?php
include_once('../includes/header.php')
?>

<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
  <div class="container">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i>Back to Home</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h5> Edit Session </h5>
        </div>
        <div class="card-body">
          <form class="" action="" method="post" enctype="multipart/form-data">

            <?php

            $sql = "SELECT course_name FROM tblcourse WHERE course_id =" . $row['course_id'];
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              $course = mysqli_fetch_assoc($result);
            } else {
              $errorMsg = 'Could not find any record';
            }

            $sql = "SELECT subject_name FROM tblsubject WHERE subject_id =" . $row['subject_id'];
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              $subject = mysqli_fetch_assoc($result);
            } else {
              $errorMsg = 'Could not find any record';
            }

            $sql = "SELECT facilitator_name FROM tblfacilitator WHERE facilitator_id =" . $row['facilitator_id'];
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              $facilitator = mysqli_fetch_assoc($result);
            } else {
              $errorMsg = 'Could not find any record';
            }
            ?>

            <div class="form-group">
              <label for="name">Course Name</label>
              <input type="text" class="form-control" name="course_id" placeholder="Enter Course Name..." value="<?php echo $course['course_name']; ?>" readonly>
            </div>

            <div class="form-group">
              <label for="name">Subject Name</label>
              <input type="text" class="form-control" name="subject_id" placeholder="Enter Subjects Name..." value="<?php echo $subject['subject_name']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="name">facilitator Name</label>
              <input type="text" class="form-control" name="facilitator_id" placeholder="Enter Facilitator Name" value="<?php echo $facilitator['facilitator_name']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="name">Session Name</label>
              <input type="text" class="form-control" name="lecture_name" placeholder="Enter Lecture Name" value="<?php echo $row['lecture_name']; ?>">
            </div>
            <div class="form-group">
              <label for="name">Session File</label>
              <file src="<?php echo $upload_dir . $row['lecture_file'] ?>">
                <input type="file" class="form-control" name="lecture_file" placeholder="Upload Lecture File" value="<?php echo $upload_dir . $row['lecture_file'] ?>">
            </div>

            <div class="form-group">
              <button type="submit" name="Submit" class="btn btn-primary waves">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="js/bootstrap.min.js" charset="utf-8"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
</body>

</html>