<?php
    if (isset($_GET['add'])) {
        require_once "connect.php";
        $sql = "INSERT INTO products (name, brand_id, price, amount, image) VALUES ('$_POST[nameA]', '$_POST[brandA]', '$_POST[priceA]', '$_POST[amountA]', '$_POST[imgA]');";

        if ($connect->query($sql)) {
            header("location: ./products_panel.php?info=Dodano nowy produkt");
        }else {
            header("location: ./products_panel.php?info=Nie udało się dodać nowego produktu");
        }
    }else {
        header("location: ./products_panel.php?info=Coś poszło nie tak");
    }
?>