<?php
    function emptyInputSignup($name, $email, $pwd){
        $result = true;
        if(empty($name) || empty($email) || empty($pwd)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function invalidName($name){
        $result = true;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $name)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email){
        $result = true;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function nameExists($connect, $name, $email){
        $sql = "SELECT * FROM users WHERE nickname = ? OR email = ?;";
        $stmt = $connect->stmt_init();
        if(!$stmt->prepare($sql)){
            header("location: ../register_form.php?error=stmtfailed");
            exit();
        }
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();

        $resultData = $stmt->get_result();
        if($row = $resultData->fetch_assoc()){
            return $row;
        }else{
            $result = false;
            return $result;
        }
        $stmt->close();
    }

    function createUser($connect, $name, $pwd, $email, $role){
        $sql = "INSERT INTO  users (nickname, password, email, role_id) VALUES (?, ?, ?, ?);";
        $stmt = $connect->stmt_init();
        if(!$stmt->prepare($sql)){
            header("location: ../register_form.php?error=stmtfailed");
            exit();
        }

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        $stmt->bind_param("ssss", $name, $hashedPwd, $email, $role);
        $stmt->execute();
        $stmt->close();
        header("location: ../register_form.php?error=none");
        exit();
    }

    function emptyInputLogin($name, $pwd){
        $result = true;
        if(empty($name) || empty($pwd)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    function loginUser($connect, $name, $pwd){
        $nameExists = nameExists($connect, $name, $name);
        if ($nameExists === false){
            header("location: ../login_form.php?error=wronglogin");
            exit();
        }

        $pwdHashed = $nameExists["password"];
        $checkPwd = password_verify($pwd, $pwdHashed);

        if ($checkPwd === false){
            header("location: ../login_form.php?error=wronglogin");
            exit();
        }else if ($checkPwd === true){
            session_start();
            $_SESSION["userid"] = $nameExists["id"];
            $_SESSION["name"] = $nameExists["nickname"];
            $_SESSION["role"] = $nameExists["role_id"];
            header("location: ../index.php");
            exit();
        }
    }
?>