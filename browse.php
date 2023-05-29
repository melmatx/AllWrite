<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Browse</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/browse.css">
<link rel="shortcut icon" href="media/favicon.png" />
</style>
</head>
<body>
    <?php
    session_start(); 
    
    if ($_SESSION['loggedIn'] == false)
    {
        echo '<script>    
        if (confirm("Invalid access! Please login first.") == true) {
            window.location = "login.html";
        }
        </script>';
    }
    ?>
    <a href="index.php" class="arrow-button"><span class="arrow-home">Home</span></a>

    <div class="post-wall">
        <div id="post-list">
            <?php
            include 'php/db_connection.php';
            $link = connectToDB();
            
            $sqlQuery = "SELECT * FROM posts";
            $result = mysqli_query($link, $sqlQuery);
            $total_count = mysqli_num_rows($result);
            
            $sqlQuery = "SELECT * FROM posts ORDER BY id DESC LIMIT 7";
            $result = mysqli_query($link, $sqlQuery);
            ?>
            <input type="hidden" name="total_count" id="total_count"
            value="<?php echo $total_count; ?>" />

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="post-item" id="<?php echo $row['id']; ?>" data-scroll>
                    <p class="date"><?php echo date('g:i A m-d-Y', strtotime($row['created_at'])); ?></p>
                    <p class="post-title"><?php echo $row['title']; ?></p>
                    <p><?php echo nl2br($row['content']); ?></p>
                    <div class="comments-btn">
                        <a class="comments-open" href="#comments" onclick="getComments(<?php echo $row['id']; ?>)">Comments</a>
                        <a class="add-open" href="#add" onclick="getComments(<?php echo $row['id']; ?>)">Add a Comment</a>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
            <div class="ajax-loader text-center">
                <img src="../media/LoaderIcon.gif"> Loading more posts...
            </div>
            <div class="comments" id="comments">
                <div class="comments-content">
                    <a href="#comments-content" class="comments-close" title="Close Comments">X</a>
                    <h3>Comments</h3>
                    <div class="comments-area"></div>
                </div>
            </div>
            <div class="add" id="add">
                <div class="add-content">
                    <a href="#add-content" class="add-close" title="Close Add Comment">X</a>
                    <h3>Add a Comment</h3>
                    <div class="add-area">
                        <form method="post" onsubmit="return submitComment();">
                            <input type="text" id="comment" name="comment" placeholder="Enter a Comment" required/>
                            <input type="hidden" id="postId" name="postId"/> 
                            <input type="submit" class="submit" name="submit" value="Submit" />
                        </form>
                    </div>
                </div>
            </div>
    </div>

<script src='https://unpkg.com/scroll-out@2.2.3/dist/scroll-out.min.js'></script>
<script src="js/browse.js"></script>
</body>
</html>