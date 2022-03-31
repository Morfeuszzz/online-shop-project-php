<?php
    include_once './header.php';

    if ($_GET['action'] == 'minus') {
        if ($_SESSION['cart'][$_GET['id']] > 0) {
            $_SESSION['cart'][$_GET['id']]--;
            header("location: ./cart.php");
            exit();
        }else if ($_SESSION['cart'][$_GET['id']] <= 0) {
            header("location: ./cart.php");
            exit();
        }
    }else if ($_GET['action'] == 'plus') {
        $_SESSION['cart'][$_GET['id']]++;
        header("location: ./cart.php");
        exit();
    }
?>