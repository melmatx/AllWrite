<?php
include 'db_connection.php';
$link = connectToDB();

session_start();

if (isset($_POST['username']) and isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE username='$username' and password='$password'";

    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['loggedIn'] = true;

        echo "<script type='text/javascript'>window.location.href='../index.php';</script>";

    } else {
        echo "<script type='text/javascript'>alert('Invalid Login Credentials!');window.location.href='../login.html';</script>";
    }
}

?>