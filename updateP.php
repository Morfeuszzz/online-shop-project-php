<?php
    if (isset($_GET['update'])) {
        require_once "connect.php";
        $sql = "UPDATE products SET name = '$_POST[nameM]', brand_id = '$_POST[brandM]', price = '$_POST[priceM]', amount = '$_POST[amountM]', image = '$_POST[imgM]' WHERE id = $_POST[id]";

        if($connect->query($sql)) {
            header("location: ./products_panel.php?info=Zaktualizowano produkt o id: $_POST[id]");
        }else {
            header("location: ./products_panel.php?info=Nie udało się zaktualizować produktu o id: $_POST[id]");
        }
    }else {
        header("location: ./products_panel.php?info=Coś poszło nie tak");
    }
?>