<?php
    if (isset($_GET['up'])) {
        require_once "connect.php";
        $sql = "UPDATE products SET name = '$_POST[nick]', brand_id = '$passwd', price = '$_POST[mail]', amount = '$_POST[sele]', image = '$_POST[img]' WHERE id = $_POST[aj]";

        if($connect->query($sql)) {
            header("location: admin_panel.php?info=Zaktualizowano użytkownika o id: $_POST[aj]");
        }else {
            header("location: admin_panel.php?info=Nie udało się zaktualizować użytkownika o id: $_POST[aj]");
        }
    }else {
        header("location: admin_panel.php?info=Coś poszło nie tak");
    }
?>