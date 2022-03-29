<?php
    if (isset($_GET['ad'])) {
        require_once "connect.php";
        $passwd = password_hash($_POST['pass2'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (nickname, password, email, role_id) VALUES ('$_POST[nick2]', '$passwd', '$_POST[mail2]', '$_POST[sele2]');";

        if ($connect->query($sql)) {
            header("location: ./admin_panel.php?info=Dodano nowego użytkownika");
        }else {
            header("location: ./admin_panel.php?info=Nie udało się dodać nowego użytkownika");
        }
    }else {
        header("location: ./admin_panel.php?info=Coś poszło nie tak");
    }
?>