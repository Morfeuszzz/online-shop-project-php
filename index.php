<?php
    session_start();
    require_once("./component.php");
    $connect = new mysqli("localhost", "root", "", "online_shop");

    if (isset($_POST['add'])) {
        if (isset($_SESSION['cart'])) {
            $item_array_id = array_column($_SESSION['cart'], "product_id");

            if (in_array($_POST['product_id'], $item_array_id)) {
                echo "<script>alert('już jest w koszyku')</script>";
                echo "<script>window.location='index.php'</script>";
            } else {
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'product_id' => $_POST['product_id']
                );
                $_SESSION['cart'][$count] = $item_array;
                print_r($_SESSION['cart']);
            }
        } else {
            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][0] = $item_array;
            print_r($_SESSION['cart']);
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
            <a href="#"><img src="chrono-logo.png" alt="shop logo"></a>
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

    <h2>Nasze produkty</h2>

    <div id="container">
        <?php
        $connect = new mysqli("localhost", "root", "", "online_shop");
        // $sql = "SELECT * FROM products JOIN brands ON products.brand_id = brands.id;";
        $sql = "SELECT products.id AS pid,name,brand_id,price,amount,image, brands.id,brands.brand FROM products JOIN brands ON products.brand_id = brands.id;";
        $result = $connect->query($sql);
        while ($row = $result->fetch_assoc()) {
            component($row['brand'], $row['name'], $row['price'], $row['image'], $row['amount'], $row['pid']);
        }
        ?>
    </div>

    <footer>&copy 2022 Copyright: Sebastian Malicki 4c</footer>
</body>
</html>
