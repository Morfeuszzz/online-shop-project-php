<?php
    if (isset($_GET['id'])) {
        require_once "connect.php";
        $sql = "DELETE FROM products WHERE id = $_GET[id];";

        if ($connect->query($sql)) {
            header("location: ./products_panel.php?info=Udało się usunąć produkt o id: $_GET[id]");
        }else {
            header("location: ./products_panel.php?info=Nie udało się usunąć produktu o id: $_GET[id]");
        }
    }else {
        header("location: ./products_panel.php?info=Coś poszło nie tak");
    }
?>