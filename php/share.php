<?php
include 'db_connection.php';
$link = connectToDB();
 
// Escape user inputs for security
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$content = mysqli_real_escape_string($link, $_REQUEST['problems']);

session_start(); 
    
if ($_SESSION['loggedIn'] == false) {
    echo '<script>    
    alert("Please login first.");
    window.location = "../login.html";
    </script>';
}
else if (empty($content)) {

    if (!empty($title)) {
        echo '<script>    
        alert("Content should not be empty!");
        window.location = "../share.html";
        </script>';
    } 
    else {
        header("Location: ../share.html"); 
    }
}
else {
    // attempt insert query execution
    $sql = "INSERT INTO posts (title, content) VALUES ('$title','$content')";

    if(!mysqli_query($link, $sql)){
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    } 
    
    // close connection
    header("Location: ../browse.php");
}

exit();
?>