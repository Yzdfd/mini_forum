<?php
include "config/db.php";
include "includes/header.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user']['id'];

/* GET USER POSTS */

$posts = mysqli_query($conn,"
SELECT * FROM posts
WHERE user_id='$user_id'
ORDER BY created_at DESC
");

?>

<h2>Your Posts</h2>

<a href="create_post.php">
<button>Create New Post</button>
</a>

<br><br>

<?php while($post = mysqli_fetch_assoc($posts)): ?>

<div class="card">

<h3><?= htmlspecialchars($post['title']) ?></h3>

<p><?= htmlspecialchars($post['content']) ?></p>

<small>
<?= $post['created_at'] ?>
</small>

<div class="post-actions">

<a href="edit_post.php?id=<?= $post['id'] ?>">Edit</a>

<a href="delete_post.php?id=<?= $post['id'] ?>"
onclick="return confirm('Delete this post?')">
Delete
</a>

</div>

</div>

<?php endwhile; ?>