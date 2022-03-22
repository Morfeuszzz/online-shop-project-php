<?php
    function component($productbrand, $productname, $productprice, $productimage, $productamount, $productid){
        $alt = substr($productimage, 0, -4);
        $element = "
                <div class=\"card\">
                    <form action=\"index.php\" method=\"post\">
                        <div class=\"card-header\">
                            <img src=./images/$productimage alt=$alt>
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productbrand</h5>

                            <p class=\"card-text\">$productname</p>
                            
                            <p class=\"card-text\">Ilość: $productamount</p>

                            <p class=\"price\">$productprice zł</p>

                            <button type=\"submit\" name=\"add\">Dodaj do koszyka</button>
                            <input type=\"hidden\" name=\"product_id\" value=$productid>
                        </div>
                    </form>
                </div>
            ";
        echo $element;
    }
    function cartElement($productimage, $productname, $productprice, $productid){
        $alt = substr($productimage, 0, -4);
        $element = " 
            <form action=\"cart.php?action=remove&id=$productid\" method=\"POST\">
            <div class=\"image-cart\">
                <img src=./images/$productimage alt=$alt>
            </div>

            <div class=\"product-cart\">
                <h5>$productname</h5>
                <h5>$productprice</h5>
                <button type=\"submit\" name=\"remove\">Usuń</button>
            </div>

            <button type=\"button\" class=\"btn-minus\">-</button>
            <input type=\"text\" value=\"1\"> 
            <button type=\"button\" class=\"btn-plus\">+</button>
            
            <!-- w js dodac opcje dodawanie -->
            </form>
        ";
        echo $element;
}
