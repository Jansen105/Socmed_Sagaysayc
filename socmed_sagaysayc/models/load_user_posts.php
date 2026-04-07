<?php
include 'db/dbconnect.php';
$aid = $_SESSION['aid'];

$sql = "SELECT post.*, account.firstname, account.lastname 
        FROM post 
        JOIN account ON post.aid = account.aid 
        WHERE post.aid = $aid 
        ORDER BY post_date DESC, post_time DESC"; // Added ordering

$result = $con->query($sql);

while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="post-card">
        <div class="post-header">
            <div class="post-info">
                <span class="post-meta"><?php echo $row['post_date'] . " | " . $row['post_time']; ?></span>
            </div>
        </div>
        <div class="post-content">
            <?php echo nl2br(htmlspecialchars($row['post_text'])); ?>
        </div>
    </div>
    <?php
}
?>