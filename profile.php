<?php
    include_once './header.php';
?>
    <div id="profile-content">
        Witaj! To twoje dane:<br>
        <?php
            $name = $_SESSION["name"];
            $sql = "SELECT nickname, email, role_id, role.id, role.type AS type FROM users JOIN role ON users.role_id = role.id WHERE nickname = '$name'";
            $result = $connect->query($sql);
            $row = $result->fetch_assoc();

            echo '<p>Nazwa użytkownika: '.$row["nickname"].'<br>
            Email: '.$row["email"].'<br>
            Typ konta: '.$row["type"].'</p>';
        ?>
    </div>
</body>
    <?php
        include_once 'footer.php';
    ?>
</html>