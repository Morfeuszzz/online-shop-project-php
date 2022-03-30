<?php
    if (isset($_GET['update'])) {
        require_once "connect.php";
        $hashedPass = password_hash($_POST['passM'], PASSWORD_DEFAULT);
        $sql = "UPDATE users SET nickname = '$_POST[nickM]', password = '$hashedPass', email = '$_POST[emailM]', role_id = '$_POST[roleM]' WHERE id = $_POST[id]";

        if($connect->query($sql)) {
            header("location: ./admin_panel.php?info=Zaktualizowano użytkownika o id: $_POST[id]");
        }else {
            header("location: ./admin_panel.php?info=Nie udało się zaktualizować użytkownika o id: $_POST[id]");
        }
    }else {
        header("location: ./admin_panel.php?info=Coś poszło nie tak");
    }
?>