<?php
include "config/db.php";

if(isset($_POST['register'])){

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users(username,password)
VALUES('$username','$password')";

mysqli_query($conn,$sql);

header("Location: login.php");
}
?>

<?php include "includes/header.php"; ?>

<div class="card">

<h2>Register</h2>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button name="register">Register</button>
<p>Already have an account? <a href="login.php">Login</a></p>

</form>

</div>