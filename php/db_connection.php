<?php
function connectToDB()
{
    $dbhost = "sql112.epizy.com";
    $dbuser = "epiz_30606858";
    $dbpass = "s91Xvmr6opnv";
    $db = "epiz_30606858_allwrite_db";

    $link = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    return $link;
}

?>