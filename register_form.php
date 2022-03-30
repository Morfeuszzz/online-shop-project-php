<head>
    <title>Rejestracja</title>
</head>
<?php
    include_once './header.php';
?>
    <div class="signup-form">
        <h2>Zarejestruj się</h2>
        <form action="./includes/register.php" method="POST">
            <input type="text" name="nickname" placeholder="Nazwa użytkownika" id="">
            <input type="text" name="email" placeholder="Email" id="">
            <input type="password" name="pwd" placeholder="Hasło" id="">
            <button type="submit" name="submit">Zarejestruj się</button>
        </form>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Wypełnij wszystkie pola</p>";
                }else if ($_GET["error"] == "invalidname") {
                    echo "<p>Nieprawidłowa nazwa</p>";
                }else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Nieprawidłowy email</p>";
                }else if ($_GET["error"] == "nameexists") {
                    echo "<p>Istnieje już taka nazwa użytkownika</p>";
                }else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Coś poszło nie tak</p>";
                }else if ($_GET["error"] == "none") {
                    echo "<p>Zarejestrowano się!</p>";
                }
            }
        ?>
    </div>
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>