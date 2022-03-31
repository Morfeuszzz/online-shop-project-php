<head>
    <title>Panel administratora</title>
</head>
<?php
    include_once './header.php';
?>
    <div id="admin-panel">
        <?php
            $sql = "SELECT users.id AS uid, nickname, password, email, role_id, role.id, role.type AS type FROM users JOIN role ON users.role_id = role.id";
            
            echo <<< TAB
                <table id="admin-table">
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
                        <td>$row[uid]</td>
                        <td>$row[nickname]</td>
                        <td>$row[password]</td>
                        <td>$row[email]</td>
                        <td>$row[type]</td>
                        <td><a href="./delete.php?id=$row[uid]">Usuń</a></td>
                        <td><a href="./admin_panel.php?update=$row[uid]">Modyfikuj</a></td>
                    </tr>
CONTENT;
            }
            echo '</table>';
       
            echo <<< BUTTON_ADD
                <div class="btn-add">
                    <form action="admin_panel.php?add=" method="POST">
                        <button type="submit">Dodaj użytkownika</button>
                    </form>
                </div>
BUTTON_ADD;
            
            if (isset($_GET['info'])) {
                echo $_GET['info'];
            }
            
            if (isset($_GET['update'])) {
                echo <<< MODIFY
                    <div class="add-modify-block">
                        <h2>Modyfikacja użytkownika o id: $_GET[update]</h2>
                        <div class="add-modify-block-content">
                            <form method="POST" action="update.php?update=">
                                <input type="text" placeholder="Nickname" name="nickM" required><br>
                                <input type="email" placeholder="Email" name="emailM" required><br>
                                <input type="password" placeholder="Password" name="passM" required><br>
                                <input type="hidden" name="id" value=$_GET[update]>
                                <label for="roleM">Rola:</label>
                                <select id="roleM" name="roleM">
                                    <option value="1">Administrator</option>
                                    <option value="2">Moderator</option>
                                    <option value="3">User</option>
                                </select><br>
                                <button type="submit">Zmodyfikuj</button>
                            </form>
                        </div>
                    </div>
MODIFY;
            }
           
            if (isset($_GET['add'])) {
                echo <<< ADD
                    <div class="add-modify-block">
                        <h2>Dodawanie użytkownika</h2><br>
                        <div class="add-modify-block-content">
                            <form method="POST" action="add.php?add=">
                                <input type="text" placeholder="Nickname" name="nickA" required><br>
                                <input type="email" placeholder="Email" name="emailA" required><br>
                                <input type="password" placeholder="Password" name="passA" required><br>
                                <label for="roleA">Rola:</label>
                                <select id="roleA" name="roleA">
                                    <option value="1">Administrator</option>
                                    <option value="2">Moderator</option>
                                    <option value="3">User</option>
                                </select><br>
                                <button type="submit">Dodaj</button>
                            </form>
                        </div>
                    </div>
ADD;
            }
        ?>
    </div>
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>