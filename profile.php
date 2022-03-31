<head>
    <title>Profil</title>
</head>
<?php
    include_once './header.php';
?>
    <div id="profile">
        <h2>Witaj! To twoje dane:</h2><br>
        <div id="profile-content">
            <?php
                $name = $_SESSION["name"];
                $sql = "SELECT nickname, email, role_id, role.id, role.type AS type FROM users JOIN role ON users.role_id = role.id WHERE nickname = '$name'";
                $result = $connect->query($sql);
                $row = $result->fetch_assoc();

                echo '<p>Nazwa: '.$row["nickname"].'</p>';
                echo '<p>Email: '.$row["email"].'</p>';
                echo '<p>Typ konta: '.$row["type"].'</p>';
            ?>
        </div>
    </div>
</body>
    <?php
        include_once 'footer.php';
    ?>
</html>