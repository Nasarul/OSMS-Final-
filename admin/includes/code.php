<?php
session_start();

include ('../config/dbcon.php');

if(isset($_POST['addAdmnUser']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user_query ="INSERT INTO admnusers (name,email,password) VALUES ('$name','$email','$password')";
    $user_query_run = mysqli_query($conn, $user_query);

    if($user_query_run)
    {
        $_SESSION['status'] = "User Added Successfully";
        header("Location: ../admnUsers.php");
    }
    else{
        $_SESSION['status'] = "User Registration Faild";
        header("Location: ../admnUsers.php");
    }
}

?>
