<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Video Display Site</title>

  <style media="screen">
    body {
      padding: 0px;
      margin: 0px;
    }

    h1 {
      background-color: dodgerblue;
      text-align: center;
      color: #FFFFFF;
      font-size: 48px;
      padding: 10px;
      margin-top: 0px;
    }

    ul {
      list-style-type: none;
    }

    li {
      float: left;
      margin-left: 15px;
      margin-top: 40px;
    }

    p {
      font-weight: bold;
      max-width: 380px;
      font-size: 18px;
      height: 30px;
    }

    a {
      float: right;
    }
  </style>

</head>

<?php
include('../includes/header.php');
?>

<body>
  <h1>Class Video</h1>
  <ul>
    <a class="btn btn-info" href="video_insert.php"><i class="fa-solid fa-photo-film"></i> Insert more Video</a>
    <a class="btn btn-outline-danger" href="../index.php"><i class="fa fa-sign-out-alt"></i>Back to Dashboard</a>

    <?php
    include('../config/dbcon.php');
    $sql1 = "SELECT * from video";
    $query1 = mysqli_query($conn, $sql1);
    while ($info = mysqli_fetch_array($query1)) {
    ?>
      <li>
        <p><?php echo $info['title']; ?></p>
        <video src="../../admin/uploads/video/<?php echo $info['video']; ?>" width="380px" poster="../../admin/uploads/thumbnail/<?php echo $info['thumbnail']; ?>" controls>
        </video>
      </li>

    <?php
    }
    ?>
  </ul>

  </div>

</body>

</html>