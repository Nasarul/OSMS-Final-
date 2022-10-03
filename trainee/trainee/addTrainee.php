<?php
include('saveTrainee.php');
include_once('../includes/header.php')
?>

<body>
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
      <a class="navbar-brand" href="index.php">Trainee's Information</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i>Back to Home</a></li>
        </ul>
      </div>
    </div>
  </nav>


<!-- extra code for NAPD's auto number -->

<?php
        $query2 = "select * from tbltrainee order by trainee_roll desc limit 1";
        $result2 = mysqli_query($conn,$query2);
        $row = mysqli_fetch_array($result2);
        $last_id = $row['trainee_roll'];
        if ($last_id == "")
        {
            $trainee_roll = "2021PGD4ICT01101";
        }
        else
        {
            $trainee_roll = substr($last_id, 3);
            $trainee_roll = intval($trainee_roll);
            $trainee_roll = "2021PGD4ICT01101" . ($trainee_roll + 1);
        }
    ?>

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Informations</div>
          <div class="card-body">
            <form class="" action="saveTrainee.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Trainee's Roll</label>
                <input type="text" class="form-control" name="trainee_roll" id="roll" style="color: red" placeholder="Enter trainee's roll number" value=" <?php echo $trainee_roll; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="name">Trainee's Name</label>
                <input type="text" class="form-control" name="trainee_name" placeholder="Enter Trainee's Name" value="">
              </div>
              <div class="form-group">
                <label for="name">Trainee's Designation</label>
                <input type="text" class="form-control" name="designation" placeholder="Enter designation" value="">
              </div>
              <div class="form-group">
                <label for="name">Trainee's Organization</label>
                <input type="text" class="form-control" name="organization" placeholder="Enter organization" value="">
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="contact">Mobile</label>
                    <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile" value="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="contact">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" placeholder="Enter date of birth" value="">
                  </div>
                </div>
                <div class="form-group">

                  <label for="contact">Blood Group</label>
                  <div class="col">
                    <select type="text" class="form-select form-select-sm" name="bg" aria-label=".form-select-sm example">
                      <option selected>Select one</option>
                      <option value="A(+)">A(+)</option>
                      <option value="A(-)">A(-)</option>
                      <option value="B(+)">B(+)</option>
                      <option value="B(-)">B(-)</option>
                      <option value="O(+)">O(+)</option>
                      <option value="O(-)">O(-)</option>
                      <option value="AB(+)">AB(+)</option>
                      <option value="AB(-)">AB(-)</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="image">Picture</label>
                <input type="file" class="form-control" name="image" value="">
              </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
          <a class="btn btn-primary waves" href="index.php" role="button">Cancel</a>
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