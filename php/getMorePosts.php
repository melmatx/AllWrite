<?php
include 'db_connection.php';
$link = connectToDB();

$lastId = $_GET['lastId'];
$sqlQuery = "SELECT * FROM posts WHERE id < '" .$lastId . "' ORDER BY id DESC LIMIT 7";

$result = mysqli_query($link, $sqlQuery);

while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="post-item" id="<?php echo $row['id']; ?>">
        <p class="date"><?php echo date('g:i A m-d-Y', strtotime($row['created_at'])); ?></p>
        <p class="post-title"><?php echo $row['title']; ?></p>
        <p><?php echo $row['content']; ?></p>
        <div class="comments-btn">
            <a class="comments-open" href="#comments" onclick="getComments(<?php echo $row['id']; ?>)">Comments</a>
            <a class="add-open" href="#add" onclick="getComments(<?php echo $row['id']; ?>)">Add a Comment</a>
        </div>
    </div>
<?php
}
?>