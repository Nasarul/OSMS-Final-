
<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'napd_olms';

$conn = mysqli_connect("$host","$username","$password","$database");

    // Check connection
    if (!$conn) 
    {
      header("Location: ../errors/db.php");
      die();
    } 

//     if ($con)
// {
//         echo "Database connected!";
//     }

?>
