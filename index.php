<?php
include "config/db.php";
include "includes/header.php";

$posts = mysqli_query($conn,"
SELECT posts.*, users.username
FROM posts
JOIN users ON posts.user_id = users.id
ORDER BY posts.created_at DESC
");

if(!$posts){
die(mysqli_error($conn));
}
?>

<h2>Latest Discussions</h2>

<?php while($post = mysqli_fetch_assoc($posts)): ?>

<div class="post-card">

<div class="post-header">

<h3>
<a href="post.php?id=<?= $post['id'] ?>">
<?= htmlspecialchars($post['title']) ?>
</a>
</h3>

</div>

<div class="post-content">

<p>
<?= substr(htmlspecialchars($post['content']),0,150) ?>...
</p>

</div>

<div class="post-footer">

<span>
👤 
<a href="profile.php?id=<?= $post['user_id'] ?>">
<?= $post['username'] ?>
</a>
</span>

<span>
🕒 <?= $post['created_at'] ?>
</span>

<a class="read-btn" href="post.php?id=<?= $post['id'] ?>">
Read Discussion →
</a>

</div>

</div>

<?php endwhile; ?>