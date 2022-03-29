<?php
    include_once './header.php';
?>
<div id="products-panel">
    <?php
        $sql = "SELECT * FROM products JOIN brands ON products.brand_id = brands.id;";
        //Generowanie Tabelki
        echo <<< TAB
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
TAB;
        $result = $connect->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo <<< TAB
            <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[brand]</td>
                <td>$row[price]</td>
                <td>$row[amount]</td>
                <td>$row[image]</td>
                <td><a href="./deleteP.php?id=$row[id]">Usuń</a></td>
                <td><a href="./products_panel.php?upd=$row[id]">Modyfikuj</a></td>
            </tr>
TAB;
        }
        echo "</table>";
        //Dodawanie produktu
        echo <<< ADD
            <form action="products_panel.php?add=" method="POST">
                <input type="submit" value="Dodaj produkt">
            </form>
ADD;
        //Koniec dodawania produktu
        //Koniec generowania tabeli
        //Odbieranie komunikatów
        if (isset($_GET['info'])) {
            echo $_GET['info'];
        }
        //Koniec odbierania komunikatów
        //Formularz modyfikacji
        if (isset($_GET['upd'])) {
            echo <<< FORM
            <h2>Modyfikacja produktu o id:$_GET[upd]</h2>
            <form method="POST" action="updateP.php?up=">
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
        //Koniec formularza modyfikacji
        //Dodawanie produktu
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
        //Koniec dodawania produktu
    ?>
</div>
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>