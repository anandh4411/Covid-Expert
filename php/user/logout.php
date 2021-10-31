<?php
session_start();
unset($_SESSION['user-id']);
unset($_SESSION['user-name']);
header("Location: ../../index.php");
?>