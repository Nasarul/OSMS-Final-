<?php
session_start();

include ('../config/dbcon.php');

if(isset($_POST['addTeaUser']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user_query ="INSERT INTO teausers (name,email,password) VALUES ('$name','$email','$password')";
    $user_query_run = mysqli_query($conn, $user_query);

    if($user_query_run)
    {
        $_SESSION['status'] = "User Added Successfully";
        header("Location: ../teausers.php");
    }
    else{
        $_SESSION['status'] = "User Registration Faild";
        header("Location: ../teausers.php");
    }
}

?>
