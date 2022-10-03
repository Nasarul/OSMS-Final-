<?php
include('saveStuUsers.php');
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

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Trainee's Informations</div>
          <div class="card-body">
            <form class="" action="saveStuUsers.php" method="post" enctype="multipart/form-data">
              
              <div class="form-group">
                <label for="name">Trainee's Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" value="">
              </div>
      
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="">
                  </div>
                </div>
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