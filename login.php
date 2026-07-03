<?php
session_start();
require 'fungsi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = login($_POST);

    if ($login === true) {
        header("Location: mahasiswa.php");
        exit;
    } else {
        echo $login;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <link rel="stylesheet" href="assets/style/login.css" />
    <form action="login.php" method="post">
        <h1 align="center">Login</h1>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
        <p>Belum Punya Akun ? <a href="register.php">Register</a><p>
</form>
</body>
</html>