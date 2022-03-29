<?php
    include_once './header.php';
?>
    <h2>Nasze produkty</h2>

    <div id="container">
        <?php
        $connect = new mysqli("localhost", "root", "", "online_shop");
        $sql = "SELECT products.id AS pid, name, brand_id, price, amount, image, brands.id, brands.brand FROM products JOIN brands ON products.brand_id = brands.id;";
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
