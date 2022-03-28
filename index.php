<?php
    // session_start();
    // require_once("./component.php");
    // $connect = new mysqli("localhost", "root", "", "online_shop");

    // if (isset($_POST['add'])) {
    //     if (isset($_SESSION['cart'][$_POST['product_id']])) {
    //         $_SESSION['cart'][$_POST['product_id']]++;
    //     }else{
    //         $_SESSION['cart'][$_POST['product_id']]=1;
    //     }
    // }
?>
<!-- <!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Chrono69</title>
</head>
<body> -->
    <?php
        include_once './header.php';
    ?>

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

    <?php
        include_once 'footer.php';
    ?>
</body>
</html>
