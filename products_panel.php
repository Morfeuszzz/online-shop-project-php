<head>
    <title>Panel produktów</title>
</head>
<?php
    include_once './header.php';
?>
    <div id="products-panel">
        <?php
            $sql = "SELECT products.id AS pid, name, brand_id, price, amount, image, brands.id, brands.brand AS brand FROM products JOIN brands ON products.brand_id = brands.id;";
            
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
                echo <<< CONTENT
                <tr>
                    <td>$row[pid]</td>
                    <td>$row[name]</td>
                    <td>$row[brand]</td>
                    <td>$row[price]</td>
                    <td>$row[amount]</td>
                    <td>$row[image]</td>
                    <td><a href="./deleteP.php?id=$row[pid]">Usuń</a></td>
                    <td><a href="./products_panel.php?update=$row[pid]">Modyfikuj</a></td>
                </tr>
CONTENT;
            }
            echo "</table>";
            
            echo <<< BUTTON_ADD
                <form action="products_panel.php?add=" method="POST">
                    <input type="submit" value="Dodaj produkt">
                </form>
BUTTON_ADD;

            if (isset($_GET['info'])) {
                echo $_GET['info'];
            }
            
            if (isset($_GET['update'])) {
                echo <<< MODIFY
                <h2>Modyfikacja produktu o id:$_GET[update]</h2>
                <form method="POST" action="updateP.php?update=">
                    <input type="text" placeholder="Name" name="nameM" required><br>
                    <label for="brandM">Brand:</label>
                    <select id="brandM" name="brandM">
                        <option value="1">Rolex</option>
                        <option value="2">Omega</option>
                    </select><br>
                    <input type="number" placeholder="Price" name="priceM" min=1 required><br>
                    <input type="number" placeholder="Amount" name="amountM" min=1 required><br>
                    <input type="text" placeholder="Image" name="imgM" required><br>
                    <input type="hidden" name="id" value=$_GET[update]>
                    <input type="submit" value="Zmodyfikuj">
                </form>
MODIFY;
            }
        
            if (isset($_GET['add'])) {
                echo <<< ADD
                <h2>Dodawanie użytkownika</h2><br>
                <form method="POST" action="addP.php?add=">
                    <input type="text" placeholder="Name" name="nameA" required><br>
                    <label for="brandA">Brand:</label>
                    <select id="brandA" name="brandA">
                        <option value="1">Rolex</option>
                        <option value="2">Omega</option>
                    </select><br>
                    <input type="number" placeholder="Price" name="priceA" min=1 required><br>
                    <input type="number" placeholder="Amount" name="amountA" min=1 required><br>
                    <input type="text" placeholder="Image" name="imgA" required><br>
                    <input type="submit" value="Dodaj">
                </form>
ADD;
            }
        ?>
    </div>
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>