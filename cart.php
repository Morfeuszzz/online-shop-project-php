<head>
    <title>Koszyk</title>
</head>
<?php
    include_once './header.php';

    if (isset($_POST['remove'])) {
        unset($_SESSION['cart'][$_POST['product_id']]);
    }
?>
    <div id="container-fluid">
        <h2>Mój koszyk</h2>
        <div class="shopping-cart">
            <?php
                $totalAll = 0;
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    $sql = "SELECT * FROM products";
                    $result = $connect->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        foreach ($_SESSION['cart'] as $key => $amount) {
                            if ($row['id'] == $key) {
                                cartElement($row['image'], $row['name'], $row['price'], $row['id'], $amount);
                                $totalAll += (int)(($row['price'])*$amount);
                            }
                        }
                    }
                }
            ?>
        </div>
    </div>
    <div id="info-cart">
        <div id="price-details">
            <h3>Szczegóły koszyka</h3>
            <?php
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    $count = 0;
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $count += $value;
                    }
                    echo "<p>Przedmioty razem: $count</p>";
                    echo "<p>Łączna cena: $totalAll zł</p>";
                    echo "<a href='order.php'>Zamów</a>";
                }else {
                    echo "<p>Koszyk jest pusty</p>";
                    echo "<p>Przedmioty razem: 0</p>";
                    echo "<p>Łączna cena: 0 zł</p>";
                }
            ?>
        </div>
    </div>
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>
