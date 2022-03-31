<?php
    include_once 'header.php';
    
    if (isset($_SESSION['name'])) {
        if (!empty($_SESSION['cart'])) {
            $priceAll = 0;
            foreach ($_SESSION['cart'] as $id => $amount) {
                $sql = "SELECT price FROM products WHERE id = $id;";
                $result = $connect->query($sql);
                $row = $result->fetch_assoc();
                $priceAll += ($row["price"])*$amount;
            }
            $date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO orders (id, user_id, date, price) VALUES (NULL, $_SESSION[userid], '$date', $priceAll);";
            $connect->query($sql);

            echo "<h2>Dziękujemy za złożenie zamówienia:)</h2>";
            
            $orderId = $connect->insert_id;
            foreach ($_SESSION['cart'] as $id => $amount) {
                $sql = "INSERT INTO orders_products (orders_id, product_id, amount) VALUES ($orderId, $id, $amount);";
                $connect->query($sql);

                $sql = "UPDATE products SET amount = amount - $amount WHERE id = $id;";
                $connect->query($sql);
            }
            unset($_SESSION['cart']);
        }else {
            header("location: ./cart.php/error=emptycart");
            exit();
        }
    }else {
        header("location: ./login_form.php?error=mustlogin");
        exit();
    }
    include_once 'footer.php';
?>