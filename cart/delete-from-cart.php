<?php

session_start();

$index = array_search($_GET['id'], $_SESSION['cart']);
unset($_SESSION['cart'][$index]);
header('location: cart.php');
