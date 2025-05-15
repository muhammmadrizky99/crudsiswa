<?php
session_start();
include "config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $user = mysqli_fetch_assoc($result);

   
    if ($user && $password === $user['password']) {
        $_SESSION['login'] = true;
        header("Location: index.php");
        exit;
    } else {
        echo "Login gagal";
    }
}
?>

<form method="POST">
  <label>Username</label><br>
  <input type="text" name="username"><br>
  <label>Password</label><br>
  <input type="password" name="password"><br><br>
  <button type="submit">Login</button>
</form>
