<?php
    session_start();
    require_once("./component.php");
    $connect = new mysqli("localhost", "root", "", "online_shop");

    if(isset($_POST['remove'])){
        if($_GET['action'] == 'remove'){
            foreach($_SESSION['cart'] as $key => $value){
                if($value['product_id'] == $_GET['id']){
                    unset($_SESSION['cart'][$key]);
                    echo "<script>window.location = 'cart.php'</script>";
                }
            }
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
    <title>Shopping Cart</title>
</head>
<body>
    <header>
        <div id="logo">
            <a href="./index.php"><img src="chrono-logo.png" alt="shop logo"></a>
        </div>
        <div id="title">Chrono69</div>
        <ul class="menu">
            <li><a href="./login.php">Logowanie</a></li>
            <li><a href="./register.php">Rejestracja</a></li>
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

    <div id="container-fluid">
        <div class="shopping-cart">
            <h6>Mój koszyk</h6>
            <hr>
            <?php
                $total = 0;
                if(isset($_SESSION['cart'])){
                    $product_id = array_column($_SESSION['cart'], 'product_id');
                    $sql = "SELECT * FROM products";
                    $result = $connect->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        foreach($product_id as $id){
                            if($row['id'] == $id){
                                cartElement($row['image'], $row['name'], $row['price'], $row['id']);
                                $total += (int)$row['price']; 
                            }
                        }
                    }
                }else{
                    echo "<h5>Koszyk jest pusty</h5>";
                }
            ?>
        </div>
    </div>
    <div id="info-cart">
        <div id="price-details">
            <h6>Szczegóły koszyka</h6>
            <?php
                if(isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                    echo "<h6>Przedmioty razem $count</h6>";
                    echo "<h6>Łączna cena $total zł</h6>";
                }else{
                    echo "<h6>Przedmioty razem 0</h6>";
                }
            ?>
        </div>
    </div>

    <footer>&copy 2022 Copyright: Sebastian Malicki 4c</footer>
</body>
</html>
