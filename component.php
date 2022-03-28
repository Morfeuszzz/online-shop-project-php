<?php
    function component($productbrand, $productname, $productprice, $productimage, $productamount, $productid){
        $alt = substr($productimage, 0, -4);
        $element = "
                <div class=\"card\">
                    <form action=\"index.php\" method=\"POST\">
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
    function cartElement($productimage, $productname, $productprice, $productid, $sztuki){
        $alt = substr($productimage, 0, -4);
        $element = " 
            <form action=\"cart.php\" method=\"POST\">
            <div class=\"image-cart\">
                <img src=./images/$productimage alt=$alt>
            </div>

            <div class=\"product-cart\">
                <h5>$productname</h5>
                <h5>$productprice</h5>
                <button type=\"submit\" name=\"remove\">Usuń</button>
            </div>

            <button type=\"button\" class=\"btn-minus\">-</button>
            <input type=\"text\" value=$sztuki> 
            <button type=\"button\" class=\"btn-plus\">+</button>
            <input type=\"hidden\" name=\"product_id\" value=$productid>

            </form>
            ";
            // <!-- w php dodac opcje dodawanie -->
        echo $element;
}
