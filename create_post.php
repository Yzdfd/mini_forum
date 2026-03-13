<?php
include "config/db.php";
include "includes/header.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user']['id'];

if(isset($_POST['create'])){

$title = $_POST['title'];
$content = $_POST['content'];

mysqli_query($conn,"
INSERT INTO posts(user_id,title,content)
VALUES('$user_id','$title','$content')
");

header("Location: dashboard.php");
exit;

}
?>

<div class="card">

<h2>Create New Post</h2>

<form method="POST">

<label>Title</label>
<input type="text" name="title" required>

<label>Content</label>
<textarea name="content" rows="6" required></textarea>

<br>

<button name="create">Publish Post</button>

</form>

</div>