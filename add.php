<?php
    if (isset($_GET['add'])) {
        require_once "connect.php";
        $passwd = password_hash($_POST['passA'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (nickname, password, email, role_id) VALUES ('$_POST[nickA]', '$passwd', '$_POST[emailA]', '$_POST[roleA]');";

        if ($connect->query($sql)) {
            header("location: ./admin_panel.php?info=Dodano nowego użytkownika");
        }else {
            header("location: ./admin_panel.php?info=Nie udało się dodać nowego użytkownika");
        }
    }else {
        header("location: ./admin_panel.php?info=Coś poszło nie tak");
    }
?>