<head>
    <title>Koszyk</title>
</head>
<?php
    include_once './header.php';

    if(isset($_POST['remove'])){
        unset($_SESSION['cart'][$_POST['product_id']]);
    }
?>
    <div id="container-fluid">
        <div class="shopping-cart">
            <h6>Mój koszyk</h6>
            <hr>
            <?php
                $total = 0;
                if(isset($_SESSION['cart'])){
                    $sql = "SELECT * FROM products";
                    $result = $connect->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        foreach($_SESSION['cart'] as $key => $sztuki){
                            if($row['id'] == $key){
                                cartElement($row['image'], $row['name'], $row['price'], $row['id'], $sztuki);
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
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>
