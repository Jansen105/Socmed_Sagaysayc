<?php 
session_start();
include '../db/dbconnect.php';

$post = htmlspecialchars($_POST['post-area']);
$aid = $_SESSION['aid'];

$sql = "INSERT INTO post (aid, post_text, post_date, post_time)
        VALUES ('$aid', '$post', NOW(), current_time())";

if($con->query($sql) === TRUE) {
    header("location:../profile.php");
} else {
    echo "Error: " . $con->error;
}
?>