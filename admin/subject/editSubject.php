<?php
require_once('../config/dbcon.php');
// $upload_dir = '../uploads/lecture/';

if (isset($_GET['subject_id'])) {
  $subject_id = $_GET['subject_id'];
  $sql = "SELECT * FROM tblsubject WHERE subject_id =" . $subject_id;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    $errorMsg = 'Could not find any record';
  }
}

if (isset($_POST['Submit'])) {
  $course_id = $_POST['course_id'];
  $code = $_POST['code'];
  $subject_name = $_POST['subject_name'];

  if (!isset($errorMsg)) {
    $sql = "UPDATE tblsubject
									SET course_id = '" . $course_id . "',
                  code = '" . $code . "',
                  subject_name = '" . $subject_name . "'
				WHERE	subject_id=" . $subject_id;
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $successMsg = 'New record updated successfully';
      header('Location:index.php');
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
          <h5> Edit Subject </h5>
        </div>
        <div class="card-body">
          <form class="" action="saveSubject.php" method="post" enctype="multipart/form-data">


            <?php
            $sql1 = "SELECT course_name, course_id FROM tblcourse WHERE course_id =" . $row['course_id'];
            $result1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($result1) > 0) {
              $course = mysqli_fetch_assoc($result1);
            } else {
              $errorMsg = 'Could not find any record';
            }
            ?>
            <div class="form-group">
              <input type="hidden" class="form-control" name="abcd" placeholder="Enter Course Name..." value="<?php echo $course['course_id']; ?>">
            </div>

            <div class="form-group">
              <label for="name">Course Name</label>
              <input type="text" class="form-control" name="course_id" placeholder="Enter Course Name..." value="<?php echo $course['course_name']; ?>" readonly>
            </div>

            <div class="form-group">
              <label for="name">Subject Code</label>
              <input type="text" class="form-control" name="code" placeholder="Enter Subjects code..." value="<?php echo $row['code']; ?>">
            </div>
            <div class="form-group">
              <label for="name">Subject Name</label>
              <input type="text" class="form-control" name="subject_name" placeholder="Enter Subjects Name..." value="<?php echo $row['subject_name']; ?>">
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