<?php
    include_once './header.php';
?>
<div id="admin-panel">
    <?php
        $sql = "SELECT * FROM users";
        //generowanie tabeli
        echo <<< TAB
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nickname</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Rola</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
TAB;
        $result = $connect->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo <<< CONTENT
                <tr>
                    <td>$row[id]</td>
                    <td>$row[nickname]</td>
                    <td>$row[password]</td>
                    <td>$row[email]</td>
                    <td>$row[type]</td>
                    <td><a href="./delete.php?id=$row[id]">Usuń</a></td>
                    <td><a href="./admin_panel.php?upd=$row[id]">Modyfikuj</a></td>
                </tr>
CONTENT;
        }
        echo '</table>';
        //koniec tabeli
        //przycisk do dodawania użytkownika
        echo <<< ADD
            <form action="admin_panel.php?add=" method="POST">
            <input type="submit" value="Dodaj użytkownika">
            </form>
ADD;
        //koniec przycisku do dodawania użytkownika
        //odbieranie komunikatów
        if (isset($_GET['info'])) {
            echo $_GET['info'];
        }
        //koniec odbierania komunikatów
        //formularz modyfikacji
        if (isset($_GET['upd'])) {
            echo <<< FORM
                <h2>Modyfikacja użytkownika o id:$_GET[upd]</h2>
                <form method="post" action="update.php?up=">
                    <input type="text" placeholder="Nickname" name="nick" required><br>
                    <input type="password" placeholder="Password" name="pass" required><br>
                    <input type="email" placeholder="Email" name="mail" required><br>
                    <input type="hidden" name="aj" value=$_GET[upd]>
                    <label for="upr">Rola:</label>
                    <select id="upr" name="sele">
                        <option value="1">Administrator</option>
                        <option value="2">Moderator</option>
                        <option value="3">User</option>
                    </select><br>
                    <input type="submit" value="Zmodyfikuj">
                </form>
FORM;
        }
        //koniec generowania formularza
        //dodawanie użytkownika
        if (isset($_GET['add'])) {
            echo <<< FORM
                <h2>Dodawanie użytkownika</h2><br>
                <form method="post" action="add.php?ad=">
                    <input type="text" placeholder="Nickname" name="nick2" required><br>
                    <input type="password" placeholder="Password" name="pass2" required><br>
                    <input type="email" placeholder="Email" name="mail2" required><br>
                    <label for="upr">Rola:</label>
                    <select id="upr" name="sele2">
                        <option value="1">Administrator</option>
                        <option value="2">Moderator</option>
                        <option value="3">User</option>
                    </select><br>
                    <input type="submit" value="Dodaj">
                </form>
FORM;
        }
        //koniec dodawania użytkownika
    ?>
</div>
<?php
    include_once 'footer.php';
?>
</body>
</html>