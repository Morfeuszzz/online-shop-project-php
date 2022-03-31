<?php
    function component($productbrand, $productname, $productprice, $productimage, $productamount, $productid) {
        $alt = substr($productimage, 0, -4);
        $element = "
                <div class=\"card\">
                    <form action=\"index.php\" method=\"POST\">
                        <div class=\"card-header\">
                            <img src=./images/$productimage alt=$alt>
                        </div>
                        <div class=\"card-body\">
                            <p class=\"card-title\">$productbrand</p>

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
    function cartElement($productimage, $productname, $productprice, $productid, $amount) {
        $alt = substr($productimage, 0, -4);
        $element = " 
            <div class=\"cart-card\">
                <form action=\"cart.php\" method=\"POST\">
                    <div class=\"image-cart\">
                        <img src=./images/$productimage alt=$alt>
                    </div>

                    <div class=\"product-cart\">
                        <p class=\"product-name\">$productname</p>
                        <p class=\"product-price\">$$productprice</p>
                        
                        <button type=\"submit\" name=\"remove\">Usuń</button>
                    </div>

                    <div class=\"btn-minus\">
                        <a href=\"btn_plus_minus.php?id=$productid&action=minus\">-</a>
                    </div>

                    <input type=\"number\" name=\"inputAmount\" min=0 value=$amount> 
                    
                    <div class=\"btn-plus\">
                        <a href=\"btn_plus_minus.php?id=$productid&action=plus\">+</a>
                    </div>
            
                    <input type=\"hidden\" name=\"product_id\" value=$productid>

                </form>
            </div>
            ";
        echo $element;
}
