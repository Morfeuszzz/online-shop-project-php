<?php
    if (isset($_POST["submit"])){
        $name = $_POST["nickname"];
        $pwd = $_POST["pwd"];

        require_once '../connect.php';
        require_once './functions.php';
    
        if(emptyInputLogin($name, $pwd) !== false){
            header("location: ../login_form.php?error=emptyinput");
            exit();
        }

        loginUser($connect, $name, $pwd);
    }else {
        header("location: ../login_form.php");
        exit();
    }

?>