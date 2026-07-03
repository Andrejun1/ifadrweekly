<?php
session_start();
require 'fungsi.php';

session_unset();
session_destroy();

header("Location: login.php");
exit();
?>