<?php
include('deleteSubject.php');
include('../includes/header.php');
?>

<body>
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
      <a class="navbar-brand">SUBJECT INFORMATION</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="btn btn-primary" href="addSubject.php"><i class="fa fa-user-plus"></i>Add Subject Info</a></li>
          <li class="nav-item"><a class="btn btn-outline-danger" href="../index.php"><i class="fa fa-sign-out-alt"></i>Back to Dashboard</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-100">
        <div class="card">
          <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:110%">
              <thead>
                <tr>
                  <th style="text-align:center">SL.</th>
                  <th style="text-align:center">Course Name</th>
                  <th style="text-align:center">Subject Code</th>
                  <th style="text-align:center">Subject Name</th>
                  <th style="text-align:center; width: 16%">Actions</th>
                </tr>
              </thead>

              <tbody <?php
                      include('../config/dbcon.php');
                      $per_page = 5;
                      $start = 0;
                      $current_page = 1;
                      if (isset($_GET['start'])) {
                        $start = $_GET['start'];
                        if ($start <= 0) {
                          $start = 0;
                          $current_page = 1;
                        } else {
                          $current_page = $start;
                          $start--;
                          $start = $start * $per_page;
                        }
                      }
                      $record = mysqli_num_rows(mysqli_query($conn, "select subject_id from tblsubject"));
                      $pagi = ceil($record / $per_page);

                      ?> <?php
                          $j = $start+1;
                          $sql2 = "SELECT tblsubject.subject_id, tblsubject.code, tblsubject.subject_name, tblcourse.course_name FROM tblsubject LEFT JOIN tblcourse on tblsubject.course_id = tblcourse.course_id ORDER BY tblsubject.subject_id LIMIT $per_page offset $start;";

                          $result = mysqli_query($conn, $sql2);
                          if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                          ?> <tr>
                <td><?php echo $j ?></td>
                <td><?php echo $row['course_name'] ?></td>
                <td><?php echo $row['code'] ?></td>
                <td><?php echo $row['subject_name'] ?></td>
                <td class="text-center">
                  <a href="viewSubject.php?subject_id=<?php echo $row['subject_id'] ?>" class="btn btn-success" title="View Subject"><i class="fa fa-eye"></i></a>
                  <a href="editSubject.php?subject_id=<?php echo $row['subject_id'] ?>" class="btn btn-info" title="Edit Subject"><i class="fa fa-user-edit"></i></a>
                  <a href="index.php?delete=<?php echo $row['subject_id'] ?>" class="btn btn-danger" title="Delete Subject" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash-alt"></i></a>
                </td>
                </tr>
            <?php
                              $j++;
                            }
                          }
            ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pagenation--->
  <nav aria-label="Page navigation example" id="pagination">
    <!-- <ul class="pagination justify-content-center my-3">
      <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul> -->

    <div class="container" style="margin-top: 24px;">
      <ul class="pagination mt-30; justify-content-center">
        <?php
        for ($i = 1; $i <= $pagi; $i++) {
          $class = '';
          if ($current_page == $i) {
        ?><li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $i ?></a></li><?php
                                                                                                              } else {
                                                                                                                ?>
            <li class="page-item"><a class="page-link" href="?start=<?php echo $i ?>"><?php echo $i ?></a></li>
          <?php
                                                                                                              }
          ?>

        <?php
        }
        ?>
      </ul>
    </div>

  </nav>

  <script src="js/bootstrap.min.js" charset="utf-8"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>

</html>