<?php
session_start();

if (!isset($_SESSION['loggedInUser'])) {
    header('location: ../login/login.php');
} else {
    if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
    array_push($_SESSION['cart'], $_GET['id']);
    header('location: cart.php');
}