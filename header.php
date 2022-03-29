<?php
    session_start();
    require_once("./component.php");
    require_once("./connect.php");

    if (isset($_POST['add'])) {
        if (isset($_SESSION['cart'][$_POST['product_id']])) {
            $_SESSION['cart'][$_POST['product_id']]++;
        }else{
            $_SESSION['cart'][$_POST['product_id']]=1;
        }
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Chrono69</title>
</head>
<body>
    <header>
            <div id="logo">
                <a href="./index.php"><img src="chrono-logo.png" alt="shop logo"></a>
            </div>
            <div id="title">Chrono69</div>
            <ul class="menu">
                <?php
                // sprawdzic czy to admin czy nie by dobrze wyswietlac zawartosc dla amina, moderatora oraz usera - zrobione
                    if (isset($_SESSION['name']) && $_SESSION['role'] === 1){
                        echo '
                            <li><a href="./admin_panel.php">Panel użytkowników</a></li>
                            <li><a href="./products_panel.php">Panel produktów</a></li>
                            <li><a href="./includes/logout.php">Wyloguj</a></li>';
                    }else if (isset($_SESSION['name']) && $_SESSION['role'] === 2){
                        echo '
                            <li><a href="./products_panel.php">Panel produktów</a></li>
                            <li><a href="./includes/logout.php">Wyloguj</a></li>';
                    }else if (isset($_SESSION['name']) && $_SESSION['role'] === 3){
                        echo '
                            <li><a href="./index.php">Strona główna</a></li>
                            <li><a href="./includes/logout.php">Wyloguj</a></li>';
                    }else {
                        echo '
                            <li><a href="./login_form.php">Logowanie</a></li>
                            <li><a href="./register_form.php">Rejestracja</a></li>';
                    }
                ?>
                <li>
                    <a href="cart.php">
                        <img src="./shop-cart.png" alt="shop cart">Koszyk
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            echo "<span id='cart_count'>$count</span>";
                        } else {
                            echo "<span id='cart_count'>0</span>";
                        }
                        ?>
                    </a>
                </li>
            </ul>
    </header>