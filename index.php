<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Catalog</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php include "script.php"; ?>
    <div class="container">
        <div class="catalog">
            <form method="post" class="item">
                <img src="https://www.91-img.com/pictures/101915-v1-samsung-galaxy-j2-pro-mobile-phone-large-1.jpg" alt="Samsung J2 Pro" class="product-image">
                <input type="text" name="product" value="Samsung J2 Pro" class="product-name" readonly></input>
                <input type="text" name="price" value="$ 100.00" class="price" readonly></input>
                <input type="text" name="quantity" id="quantity" value="1" class="quantity"><br>
                <input class="btn" type="submit" name="submit" value="Add to Cart">
            </form>
            <form action="" method="post" class="item">
                <img src="https://refurb.md/public/image/catalog/61e8438d606ad.png" alt="HP Notebook" class="product-image">
                <input type="text" name="product" value="HP Notebook" class="product-name" readonly></input>
                <input type="text" name="price" value="$ 299.00" class="price" readonly></input>
                <input type="text" name="quantity" id="quantity" value="1" class="quantity"><br>
                <input class="btn" type="submit" name="submit" value="Add to Cart">
            </form>
            <form action="" method="post" class="item">
                <img src="https://www.askmea2z.com/inventory_images/13686.jpg" alt="Panasonic T44 Lite" class="product-image">
                <input type="text" name="product" value="Panasonic T44 Lite" class="product-name" readonly></input>
                <input type="text" name="price" value="$ 125.00" class="price" readonly></input>
                <input type="text" name="quantity" id="quantity" value="1" class="quantity"><br>
                <input class="btn" type="submit" name="submit" value="Add to Cart">
            </form>
            <form action="" method="post" class="item">
                <img src="https://i5.walmartimages.com/asr/aae7459a-57c6-4f86-b0dd-682f916b1242.7866d04d4fe94a6f60ab77fe3b7e13e4.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF" alt="Invicta Men's Pro" class="product-image">
                <input type="text" name="product" value="Invicta Mens Pro" class="product-name" readonly></input>
                <input type="text" name="price" value="$ 65.00" class="price" readonly></input>
                <input type="text" name="quantity" id="quantity" value="1" class="quantity"><br>
                <input class="btn" type="submit" name="submit" value="Add to Cart">
            </form>
            <form action="" method="post" class="item">
                <img src="https://i5.walmartimages.com/asr/30555923-9f53-499d-be82-8ceba0557905_1.8ff63bef2798a7415599a34b7ebd293c.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF" alt="Ibagbar Laptop Bag" class="product-image">
                <input type="text" name="product" value="Ibagbar Laptop Bag" class="product-name" readonly></input>
                <input type="text" name="price" value="$ 25.00" class="price" readonly></input>
                <input type="text" name="quantity" id="quantity" value="1" class="quantity"><br>
                <input class="btn" type="submit" name="submit" value="Add to Cart">
            </form>
            <form action="" method="post" class="item">
                <img src="http://mobileimages.lowes.com/productimages/3dcf44dd-55f8-4d98-ab4f-ef80d5a300bd/11563306.jpg" alt="LED Solar Spotlight" class="product-image">
                <input type="text" name="product" value="LED Solar Spotlight" class="product-name" readonly></input>
                <input type="text" name="price" value="$ 30.00" class="price" readonly></input>                
                <input type="text" name="quantity" id="quantity" value="1" class="quantity"><br>
                <input class="btn" type="submit" name="submit" value="Add to Cart">
            </form>
        </div>
        <div class="cart">
            <?php echo "<h2>Cart <p class='cart-total'>" .
                getTotal() .
                "</p></h2>"; ?>
            <table>
                <thead>
                    <tr>
                        <th style='text-align:left'>Product Name</th>
                        <th style='text-align:center; width:20px'>Quantity</th>
                        <th style='text-align:left'>Price</th>
                        <th style='text-align:left'>Total</th>
                        <th style='text-align:center; width:80px'>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php displayCart(); ?>
                </tbody>
            </table>
        </div>
    </div> 

</body>
</html>
