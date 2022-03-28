<?php
    if(isset($_POST['submit'])){
        $name = $_POST['nickname'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $role = 1;
        
        require_once '../connect.php';
        require_once './functions.php';

        if(emptyInputSignup($name, $email, $pwd) !== false){
            header("location: ../register_form.php?error=emptyinput");
            exit();
        }
        if(invalidName($name) !==false){
            header("location: ../register_form.php?error=invalidname");
            exit();
        }
        if(invalidEmail($email) !==false){
            header("location: ../register_form.php?error=invalidemail");
            exit();
        }
        if(nameExists($connect, $name, $email) !==false){
            header("location: ../register_form.php?error=nameexists");
            exit();
        }

        createUser($connect, $name, $pwd, $email, $role);

    }else{
        header("location: ../register_form.php");
        exit();
    }
?>
