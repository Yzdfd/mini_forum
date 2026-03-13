<?php
include "config/db.php";
include "includes/header.php";

$error = "";

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($query);

if($user && password_verify($password,$user['password'])){
    
    $_SESSION['user'] = $user;
    header("Location: index.php");
    exit;

}else{
    $error = "Username or password incorrect";
}

}
?>

<div class="card">

<h2>Login</h2>

<?php if($error): ?>
<div class="alert">
<?= $error ?>
</div>
<?php endif; ?>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>

<p>Dont have account? <a href="register.php">Register</a></p>

</form>

</div>