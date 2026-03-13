<?php
include "config/db.php";
include "includes/header.php";

if(!isset($_GET['id'])){
    die("Post not found");
}

$post_id = intval($_GET['id']);

/* GET POST */

$post_query = mysqli_query($conn,"
SELECT posts.*, users.username
FROM posts
JOIN users ON posts.user_id = users.id
WHERE posts.id='$post_id'
");

if(!$post_query){
    die(mysqli_error($conn));
}

$post = mysqli_fetch_assoc($post_query);

if(!$post){
    die("Post does not exist");
}

/* COMMENT SUBMIT */

if(isset($_POST['comment']) && isset($_SESSION['user'])){

$user_id = $_SESSION['user']['id'];
$comment = $_POST['comment'];

mysqli_query($conn,"
INSERT INTO comments(post_id,user_id,comment)
VALUES('$post_id','$user_id','$comment')
");

header("Location: post.php?id=$post_id");
exit;
}
?>

<div class="card">

<h2><?= htmlspecialchars($post['title']) ?></h2>

<p><?= htmlspecialchars($post['content']) ?></p>

<small>
Posted by <?= $post['username'] ?>
</small>

</div>


<h3>Comments</h3>

<?php

$comments = mysqli_query($conn,"
SELECT comments.*, users.username
FROM comments
JOIN users ON comments.user_id = users.id
WHERE post_id='$post_id'
ORDER BY comments.created_at DESC
");

while($c = mysqli_fetch_assoc($comments)):
?>

<div class="card">

<b><?= $c['username'] ?></b>

<p><?= htmlspecialchars($c['comment']) ?></p>

</div>

<?php endwhile; ?>


<!-- COMMENT BOX -->

<?php if(isset($_SESSION['user'])): ?>

<div class="card">

<form method="POST">

<textarea name="card comment-card" placeholder="Write your comment..." required></textarea>

<br><br>

<button type="submit">Post Comment</button>

</form>

</div>

<?php else: ?>

<div class="card">

<textarea onclick="requireLogin()" placeholder="Login to comment..."></textarea>

</div>

<?php endif; ?>


<script>
function requireLogin(){
    alert("Please login to comment");
    window.location = "login.php";
}
</script>