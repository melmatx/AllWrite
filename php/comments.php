<?php
include 'db_connection.php';
$link = connectToDB();

if (isset($_POST['postId']) and isset($_POST['comment'])) {
    $postId = $_POST['postId'];
    $comment = mysqli_real_escape_string($link, $_REQUEST['comment']);
    
    $sql = "INSERT INTO comments (post_id, body) VALUES ('$postId', '$comment')";
    
    if (!mysqli_query($link, $sql)) {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}

if (isset($_POST['currentId'])) {
    $currentId = $_POST['currentId'];
    $sqlQuery = "SELECT * FROM comments WHERE post_id='$currentId' ORDER BY id DESC";
    $result = mysqli_query($link, $sqlQuery);
    $total_count = mysqli_num_rows($result);

    if ($total_count == 0)
    {
        echo "No comments yet.";
    }

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class=\"post-item\" id=\"";
        echo $row['id']; 
        echo "\"> <h4 class=\"date\">"; 
        echo date('g:i a m-d-Y', strtotime($row['created_at']));
        echo "</h4> <p>";
        echo $row['body'];
        echo "</p> </div>";
    }
}
?>