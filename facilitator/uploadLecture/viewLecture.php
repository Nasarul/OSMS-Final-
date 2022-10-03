<?php
include('../config/dbcon.php');
include('../includes/header.php');
$upload_dir = '../uploads/lecture/';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT tbluploadlecture.upload_lecture_id, tblcourse.course_name, tblsubject.subject_name, tblfacilitator.facilitator_name, tbluploadlecture.lecture_name FROM tbluploadlecture, tblcourse, tblsubject, tblfacilitator WHERE (tbluploadlecture.upload_lecture_id=$id AND tbluploadlecture.course_id = tblcourse.course_id AND tbluploadlecture.subject_id = tblsubject.subject_id AND tbluploadlecture.facilitator_id = tblfacilitator.facilitator_id);";

  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    $errorMsg = 'Could not find any record';
  }
}
?>

<body>

  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="card">
        <div class="card-header justify-content-center">
          <h3 class="text-center">Session information</h2>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md">

              <h5 class="form-control"><i class="fa-solid fa-chalkboard-user"></i>
                <span><?php echo $row['course_name'] ?></span>
                </i>
              </h5>
              <h5 class="form-control"><i class="fa-solid fa-book-open-reader"></i>
                <span><?php echo $row['subject_name'] ?></span>
                </i>
              </h5>
              <h5 class="form-control"><i class="fa-solid fa-user-gear"></i>
                <span><?php echo $row['facilitator_name'] ?></span>
                </i>
              </h5>
              <h5 class="form-control"><i class="fa-solid fa-file-pdf"></i>
                <span><?php echo $row['lecture_name'] ?></span>
                </i>
              </h5>

              <a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i><span>Back to Home</span></a>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.min.js" charset="utf-8"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>

</html>