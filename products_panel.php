<?php
    include_once './header.php';
?>
<div id="products-panel">
    <?php
        $sql = "SELECT products.id AS pid, name, brand_id, price, amount, image, brands.id, brands.brand AS brand FROM products JOIN brands ON products.brand_id = brands.id;";
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
                <td>$row[pid]</td>
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
                <input type="text" placeholder="Name" name="name" required><br>
                <label for="brand">Brand:</label>
                <select id="brand" name="brand">
                    <option value="1">Rolex</option>
                    <option value="2">Omega</option>
                </select><br>
                <input type="number" placeholder="Price" name="price" min=1 required><br>
                <input type="number" placeholder="Amount" name="amount" min=1 required><br>
                <input type="text" placeholder="Image" name="img" required><br>
                <input type="hidden" name="aj" value=$_GET[upd]>
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
                <input type="text" placeholder="Name" name="name" required><br>
                <label for="brand">Brand:</label>
                <select id="brand" name="brand">
                    <option value="1">Rolex</option>
                    <option value="2">Omega</option>
                </select><br>
                <input type="number" placeholder="Price" name="price" min=1 required><br>
                <input type="number" placeholder="Amount" name="amount" min=1 required><br>
                <input type="text" placeholder="Image" name="img" required><br>
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