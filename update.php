<?php
    if (isset($_GET['up'])) {
        require_once "connect.php";
        $passwd = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $sql = "UPDATE users SET nickname = '$_POST[nick]', password = '$passwd', email = '$_POST[mail]', role_id = '$_POST[sele]' WHERE id = $_POST[aj]";

        if($connect->query($sql)) {
            header("location: admin_panel.php?info=Zaktualizowano użytkownika o id: $_POST[aj]");
        }else {
            header("location: admin_panel.php?info=Nie udało się zaktualizować użytkownika o id: $_POST[aj]");
        }
    }else {
        header("location: admin_panel.php?info=Coś poszło nie tak");
    }
?>