<!-- <!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Logowanie</title>
</head>
<body> -->
<?php
    include_once './header.php';
?>
    <div class="login-form">
        <h2>Zaloguj się</h2>
        <div class="login-form-form">
            <form action="./includes/login.php" method="POST">
                <input type="text" name="nickname" placeholder="Nazwa użytkownika lub email" id="">
                <input type="password" name="pwd" placeholder="Hasło" id="">
                <button type="submit" name="submit">Zaloguj się</button>
            </form>
        </div>
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Wypełnij wszystkie pola</p>";
                }else if($_GET["error"] == "wronglogin"){
                    echo "<p>Nieprawidłowa nazwa</p>";
                }
            }
        ?>
    </div>
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>