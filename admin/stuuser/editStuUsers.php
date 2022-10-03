<?php

require_once('../config/dbcon.php');

// $upload_dir = '../uploads/trainee/';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM stuusers WHERE id =" . $id;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    $errorMsg = 'Could not find any record';
  }
}

if (isset($_POST['Submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];

  if (!isset($errorMsg)) {
    $sql = "UPDATE stuusers
									SET name = '" . $name . "',
                  email = '" . $email . "'
				WHERE	id=" . $id;
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

<body>

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
            <h5> Edit Trainee's Profile </h5>
          </div>
          <div class="card-body">
            <form class="" action="" method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label for="name">Trainee's Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name..." value="<?php echo $row['name']; ?>">
              </div>

              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email ..." value="<?php echo $row['email']; ?>">
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