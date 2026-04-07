<?php
include 'db/dbconnect.php';
$aid = $_SESSION['aid'];

$sql = "SELECT account.aid,
               account.firstname,
               account.lastname,
               post.pid,
               post.post_text,
               post.post_date,
               post.post_time
        FROM account
        INNER JOIN post ON account.aid = post.aid";

$result = $con->query($sql);

while($row = mysqli_fetch_assoc($result)){
    echo "<div class='post-block'>";
    
        echo "<div class='post-content'>";
            echo $row['post_text'];
        echo "</div>";

        echo "<div class='post-time'>";
            echo $row['post_date']." ".$row['post_time']; // ✔ fixed
        echo "</div>";

    echo "</div>";
}
?>