<?php
include('saveLecture.php');
include('../includes/header.php');
include('../config/dbcon.php');
?>

<body>

  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
      <a class="navbar-brand" href="index.php">Session Information</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i>Back</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>Session Informations<h4>
          </div>
          <div class="card-body">
            <form class="" action="saveLecture.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="course_name">Course Name</label>

                <?php
                $sql = "SELECT * FROM tblcourse;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $selectedCourse[] = $row['course_name'];
                    $selectedid[] = $row['course_id'];
                  }
                }
                echo "<select id='course' type='text' class='form-control' name='course_id' placeholder='Enter Facilitator name' value=''>";

                for ($i = 0; $i < count($selectedid); $i++) {
                  echo "<option value='" . $selectedid[$i] . "'>" . $selectedCourse[$i] . " </option>";
                }
                echo "</select>";
                ?>
              </div>

              <div class="form-group">
                <label for="subject_name">Subject Name</label>
                <?php
                $sql = "SELECT * FROM tblsubject;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $selectedSubject[] = $row['subject_name'];
                    $selectedsubid[] = $row['subject_id'];
                  }
                }
                echo "<select id='subject' type='text' class='form-control' name='subject_id' placeholder='Enter Facilitator name' value=''>";
                for ($j = 0; $j < count($selectedsubid); $j++) {
                  echo "<option value='" . $selectedsubid[$j] . "'>" . $selectedSubject[$j] . " </option>";
                }
                echo "</select>";
                ?>

              </div>

              <div class="form-group">
                <label for="facilitator_name">Facilitator Name</label>
                <?php
                $sql = "SELECT * FROM tblfacilitator;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $selectedFacilitator[] = $row['facilitator_name'];
                    $selectedfaid[] = $row['facilitator_id'];
                  }
                }
                echo "<select type='text' class='form-control' name='facilitator_id'>";
                for ($k = 0; $k < count($selectedfaid); $k++) {
                  echo "<option value =" . $selectedfaid[$k] . ">" . $selectedFacilitator[$k] . "</option>";
                }
                echo "</select>";
                ?>
              </div>

              <div class="form-group">
                <label for="lecture_name">Lecture Name</label>
                <input type="text" class="form-control" name="lecture_name" placeholder="Enter Lectures name" value="">
              </div>
              <div class="form-group">
                <label for="name">Lecture File</label>
                <input type="file" class="form-control" name="lecture_file" placeholder="Enter lecture file" value="">
              </div>

              <!-- <div class="form-group">
                <label for="name">Lecture Video</label>
                <input type="file" class="form-control" name="lecture_video" placeholder="Enter lecture video" value="">
              </div> -->

              <div class="form-group">
                <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.min.js" charset="utf-8"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>

  <!-- Java script code for dependent table -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      function loadData(type, category_id) {
        $.ajax({
          url: "load-cs.php",
          type: "POST",
          data: {
            type: type,
            id: category_id
          },
          success: function(data) {
            if (type == "subjectData") {
              $("#subject").html(data);
            } else {
              $("#course").append(data);
            }

          }
        });
      }

      loadData("subjectData", 1);

      $("#course").on("change", function() {
        var course = $("#course").val();

        if (course != "") {
          loadData("subjectData", course);
        } else {
          $("#subject").html("");
        }
      })
    });
  </script>

</body>

</html>