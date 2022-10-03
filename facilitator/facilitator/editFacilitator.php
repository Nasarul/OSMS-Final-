<?php
include('../config/dbcon.php');
$upload_dir = '../../admin//uploads/facilitator/';

if (isset($_GET['facilitator_id'])) {
  $facilitator_id = $_GET['facilitator_id'];
  $sql = "SELECT * FROM tblfacilitator WHERE facilitator_id =" . $facilitator_id;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    $errorMsg = 'Could not find any record';
  }
}

if (isset($_POST['Submit'])) {
  $facilitator_name = $_POST['facilitator_name'];
  $designation = $_POST['designation'];
  $organization = $_POST['organization'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];


  $imgName = $_FILES['image']['name'];
  $imgTmp = $_FILES['image']['tmp_name'];
  $imgSize = $_FILES['image']['size'];

  if ($imgName) {

    $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

    $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

    $userPic = time() . '_' . rand(1000, 9999) . '.' . $imgExt;

    if (in_array($imgExt, $allowExt)) {

      if ($imgSize < 5000000) {
        unlink($upload_dir . $row['image']);
        move_uploaded_file($imgTmp, $upload_dir . $userPic);
      } else {
        $errorMsg = 'Image too large';
      }
    } else {
      $errorMsg = 'Please select a valid image';
    }
  } else {

    $userPic = $row['image'];
  }

  if (!isset($errorMsg)) {
    $sql = "UPDATE tblfacilitator
									SET facilitator_name = '" . $facilitator_name . "',
                  designation = '" . $designation . "',
                  organization = '" . $organization . "',
                  email = '" . $email . "',
                  mobile = '" . $mobile . "',	                   
									image = '" . $userPic . "'
				WHERE	facilitator_id=" . $facilitator_id;
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
            <h5> Edit Facilitator's Profile </h5>
          </div>
          <div class="card-body">
            <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Facilitator's Name</label>
                <input type="text" class="form-control" name="facilitator_name" placeholder="Enter Name..." value="<?php echo $row['facilitator_name']; ?>">
              </div>
              <div class="form-group">
                <label for="name">Facilitator's Designation</label>
                <input type="text" class="form-control" name="designation" placeholder="Enter designation ..." value="<?php echo $row['designation']; ?>">
              </div>
              <div class="form-group">
                <label for="name">Facilitator's Organization</label>
                <input type="text" class="form-control" name="organization" placeholder="Enter organization ..." value="<?php echo $row['organization']; ?>">
              </div>
              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email ..." value="<?php echo $row['email']; ?>">
              </div>
              <div class="form-group">
                <label for="contact">Mobile</label>
                <input type="text" class="form-control" name="mobile" placeholder="Enter mobile number ..." value="<?php echo $row['mobile']; ?>">
              </div>
              <div class="form-group">
                <label for="image">Choose photo</label>
                <div class="col-md-8">
                  <img src="<?php echo $upload_dir . $row['image'] ?>" width="100">
                  <input type="file" class="form-control" name="image" value="">
                </div>
              </div>
              <div class="form-group">
                <button type="submit" name="Submit" class="btn btn-primary waves">Save</button>
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