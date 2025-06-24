<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrology Store</title>
    <link rel="stylesheet" href="store.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="horoscope.php">Horoscope</a></li>
                <li><a href="news.html">News</a></li>
                <li><a href="profile.php">Account</a></li>
                <li><a href="moonphases.php">Moon Phase</a></li>
            </ul>
        </nav>
    </header>

    <section class="store">
        <div class="container">
            <h1>Merchandise</h1>
            <p>Check Out our products</p>

            <div class="product-grid">
                <?php
                $products = [
                    ["name" => "Astrology T-Shirt", "price" => 20, "image" => "productImages/astrology_T-shirt.jpg"],
                    ["name" => "Zodiac Mug", "price" => 12, "image" => "productImages/zodiac_mug.jpg"],
                    ["name" => "Star Pendant", "price" => 15, "image" => "productImages/star_pendant.jpg"],
                    ["name" => "Astrology Book", "price" => 18, "image" => "productImages/astrology_book.jpg"],
                    ["name" => "Star Chart Poster", "price" => 10, "image" => "productImages/star_chart_poster.jpg"],
                    ["name" => "Constellation Blanket", "price" => 30, "image" => "productImages/constellation_blanket.jpg"],
                    ["name" => "Moon Lamp", "price" => 25, "image" => "productImages/moon_lamp.jpg"],
                    ["name" => "Astrology Ring", "price" => 15, "image" => "productImages/astrology_ring.jpg"],
                    ["name" => "Zodiac Pillow", "price" => 20, "image" => "productImages/zodiac_pillow.jpg"],
                    ["name" => "Sun Mug", "price" => 12, "image" => "productImages/sun_mug.jpg"],
                    ["name" => "Celestial Necklace", "price" => 22, "image" => "productImages/celestial_necklace.jpg"],
                    ["name" => "Planetary Earrings", "price" => 16, "image" => "productImages/planetary_earrings.jpg"],
                ];

                foreach ($products as $product) {
                    echo "
                    <div class='product'>
                        <img src='{$product['image']}' alt='{$product['name']}'>
                        <h3>{$product['name']}</h3>
                        <p class='price'>\${$product['price']}.00</p>
                        <form action='cart.php' method='post'>
                            <input type='hidden' name='name' value='{$product['name']}'>
                            <input type='hidden' name='price' value='{$product['price']}'>
                            <button type='submit' name='add_to_cart'>Add to Cart</button>
                        </form>
                    </div>";
                }
                ?>
            </div>
                    <div class="view-cart-container">
                    <a href="viewCART.php" class="view-cart-btn">View Cart</a>
                    </div>

        </div>
    </section>
</body>
</html>

