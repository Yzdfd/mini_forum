<?php
include "config/db.php";
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$post_id = $_GET['id'];
$user_id = $_SESSION['user']['id'];

mysqli_query($conn,"
DELETE FROM posts
WHERE id='$post_id' AND user_id='$user_id'
");

header("Location: dashboard.php");