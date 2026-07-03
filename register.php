<?php
require 'fungsi.php';

if(isset($_POST["register"]))
{
    if(register($_POST) > 0)
    {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='login.php';</script>";
    }
    else
    {
        echo "<script>alert('Registrasi gagal! Silakan coba lagi.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/style/login.css" />
</head>
<body>
    <h1 align="center">Register</h1>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password1">Password:</label>
        <input type="password" id="password1" name="password1" required>
        <br>
        <label for="password2">Konfirmasi Password:</label>
        <input type="password" id="password2" name="password2" required>
        <br>
        <button type="submit" name="register">Register</button>
        <p>Sudah Punya Akun? <a href="login.php">Login</a></p>
    </form>
</body>
</html>