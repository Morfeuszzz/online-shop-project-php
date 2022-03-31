<head>
    <title>Logowanie</title>
</head>
<?php
    include_once './header.php';
?>
    <div id="login-form">
        <h2>Zaloguj się</h2>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Wypełnij wszystkie pola</p><br>";
                }else if ($_GET["error"] == "wronglogin") {
                    echo "<p>Nieprawidłowa nazwa lub hasło</p><br>";
                }else if ($_GET["error"] == "mustlogin") {
                    echo "<p>Aby móc złożyć zamówienie musisz się zalogować</p><br>";
                }
            }
        ?>
        <div id="login-form-form">
            <form action="./includes/login.php" method="POST">
                <input type="text" name="nickname" placeholder="Nazwa użytkownika lub email" id=""><br>
                <input type="password" name="pwd" placeholder="Hasło" id=""><br>
                <button type="submit" name="submit">Zaloguj się</button>
            </form>
        </div>
    </div>
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>