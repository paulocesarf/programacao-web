<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['nome']);
unset($_SESSION['usuario']);
unset($_SESSION['email']);

session_destroy();
header('location: index.php');
?>