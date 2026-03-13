<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mini Forum</title>

<link rel="stylesheet" href="css/style.css">

</head>
<body>

<nav class="navbar">

<div class="nav-left">

<h2 class="logo">
<a href="index.php">MiniForum</a>
</h2>

<a href="index.php">Home</a>

<?php if(isset($_SESSION['user'])): ?>
<a href="dashboard.php">Dashboard</a>
<?php endif; ?>

</div>


<div class="nav-right">

<?php if(isset($_SESSION['user'])): ?>

<span class="welcome">
 <?= $_SESSION['user']['username'] ?>
</span>

<a class="btn logout" href="logout.php">Logout</a>

<?php else: ?>

<a href="login.php">Login</a>
<a class="btn register" href="register.php">Register</a>

<?php endif; ?>

</div>

</nav>

<div class="container">