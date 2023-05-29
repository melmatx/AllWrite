<?php
include 'db_connection.php';
$link = connectToDB();

// Escape user inputs for security
$fname = mysqli_real_escape_string($link, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($link, $_REQUEST['lname']);
$email= mysqli_real_escape_string($link, $_REQUEST['email']);
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$password = mysqli_real_escape_string($link, $_REQUEST['pass']);
$cpassword = mysqli_real_escape_string($link, $_REQUEST['cpass']);

if ($password == $cpassword)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        // attempt insert query execution
        $sql = "INSERT INTO users (first_name, last_name, email, username, password) VALUES ('$fname', '$lname', '$email', '$username', '$password')";
        
        if (!mysqli_query($link, $sql)) {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        // close connection
        header("Location: ../login.html");
    }
    else {
        echo "<script type='text/javascript'>alert('Invalid email!');window.location.href='../register.html';</script>";
    }
}
else {
    echo "<script type='text/javascript'>alert('Passwords are not the same!');window.location.href='../register.html';</script>";
}

exit();
?>