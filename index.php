<?php
include 'connection1.php';
if (isset($_POST['add_to_cart'])) {
    $products_name = $_POST['product_name'];
    $products_price = $_POST['product_price'];
    $products_image = $_POST['product_image'];
    $products_quantity = 1;

    // select cart data based on condition
    $select_cart = mysqli_query($conn, "Select * from `cart` where name='$products_name'");
    if (mysqli_num_rows($select_cart) > 0) {
        $display_message = "Product already added to the cart";
    } else {
        // insert cart data in cart table
        $insert_products = mysqli_query($conn, "insert into `cart` (name,price,image,quantity)
     VALUES ('$products_name','$products_price','$products_image','$products_quantity')");
        $display_message = "Product added to cart successfully";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="ar-icon" href="../html/zero data/zerofavicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/c1f14054f5.js" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>ZeroLife Style</title>
    <link rel="stylesheet" href="../css/navbar style.css">
    <link rel="stylesheet" href="../css/mainwebsite style.css">
    <link rel="stylesheet" href="../css/cart styling.css">
    <link rel="stylesheet" href="../css/search modal.css" class="">
    <link rel="stylesheet" href="../css/footer style.css" class="">
    <style>
        #hover-btn-color:hover{
            color: rgba(231, 229, 228, 0.893);
        }
        #card-index-{
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        #card-index-:hover{
            transform: scale(1.03);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <?php
    include 'navbar.php';



    if (isset($display_message)) {
        echo "<div style='background-color: rgba(0,0,0,0.939); color: white;' class='display_message'>
        <span style='color: white;'>$display_message</span>
        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
     </div>";
    }
    ?>

    <!-- main websites -->
    <!-- carousal -->
    <div id="demo" class="carousel" data-bs-ride="carousel" style="margin-bottom: -40px;">
        <div class="carousel-indicators">
            <button data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button data-bs-target="#demo" data-bs-slide-to="2"></button>
            <button data-bs-target="#demo" data-bs-slide-to="3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active"><a href="#"><img src="../html/zero data/carousal1.png" alt=""></a></div>
            <div class="carousel-item"><a href="#"><img src="../html/zero data/carousal2.png"        alt=""></a></div>
            <div class="carousel-item"><a href="#"><img src="../html/zero data/carousal3.png"        alt=""></a></div>
            <div class="carousel-item"><a href="#"><img src="../html/zero data/carousal4.png"        alt=""></a></div>
        </div>
    </div>
    <!-- carousal -->

    <!-- zbuds start php -->

    <div class="zbuds">
        <h1 class="relative">Zbuds</h1><button><a class="view" href="./responsivezbuds.php">View All></a></button>
    </div>

    <?php

    include "connection1.php";

    $sql = "select * from `zbuds` where id IN (1, 2, 3, 4)";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <!-- zbuds start -->
            <form action="" method="post">
                <div class="zbuds">
                    <div class="Buds" id="card-index-">
                        <img src="<?php echo $row['image'] ?>" alt="">
                        <h3><?php echo $row['Name'] ?></h3>
                        <p><?php echo $row['Description'] ?></p>
                        <hr>
                        <p>Color:<?php echo $row['Color'] ?></p>
                        <h4>Rs.<?php echo number_format( $row['Price'] )?></h4>
                        <input type="hidden" name="product_name" value="<?php echo $row['Name'] ?>">
                        <input type="hidden" name="product_price" value="<?php echo $row['Price'] ?>">
                        <input type="hidden" name="product_image" value="<?php echo $row['image'] ?>">
                        <p> <strike><?php echo $row['Discount'] ?></strike><b style="text-decoration: none; color: red;"> <?php echo $row['Percentage'] ?> </b>
                            <input type="submit" class="submit_btn cart_btn" id="hover-btn-color" value="Add to Cart" name="add_to_cart">
                        </p>
                    </div>
                </div>
            </form>
            <!-- zbuds end -->


    <?php
        }
    } else {
        echo "data not found";
    }

    ?>
    <!-- zbuds end php -->

    <!-- banner1 -->
    <div class="banner1">
        <a href="#"><img src="../html/zero data/Banner_Web.webp" alt=""></a>
    </div>
    <!-- banner1 -->



    <!-- zwatches php start -->
    <div class="zwatches">
        <h1>Smart Watches</h1><button><a class="view" href="./responsiveWatches.php">View All></a></button>
    </div>

    <?php

    include "connection1.php";

    $sql = "select * from `watches` where id IN (7, 5, 4, 10)";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <!-- zwatches start -->
            <form action="" method="post">
                <div class="zwatches">
                    <div class="watches" id="card-index-">
                        <img src="<?php echo $row['image'] ?>" alt="">
                        <h3><?php echo $row['Name'] ?></h3>
                        <p><?php echo $row['Description'] ?></p>
                        <hr>
                        <p>Color:<?php echo $row['Color'] ?></p>
                        <h4>Rs.<?php echo number_format( $row['Price'] )?></h4>
                        <input type="hidden" name="product_name" value="<?php echo $row['Name'] ?>">
                        <input type="hidden" name="product_price" value="<?php echo $row['Price'] ?>">
                        <input type="hidden" name="product_image" value="<?php echo $row['image'] ?>">
                        <p> <strike><?php echo $row['Discount'] ?></strike><b style="text-decoration: none; color: red;"> <?php echo $row['percentage'] ?> </b>
                            <input type="submit" class="submit_btn cart_btn" id="hover-btn-color" value="Add to Cart" name="add_to_cart">
                        </p>
                    </div>
                </div>
            </form>
            <!-- zwatches end -->


    <?php
        }
    } else {
        echo "data not found";
    }

    ?>

    <!-- zwatches php end -->

    <!-- banner2 start -->
    <div class="row banner2" style="margin-left: 60px;">
        <div class="col-3"><img src="../html/zero data/warranty.png" alt="">1 Year Warranty</div>
        <div class="col-3"><img src="../html/zero data/replacement.png" alt="">7 Days Replacement</div>
        <div class="col-3"><img src="../html/zero data/free-delivery.png" alt="">Free Shipping</div>
        <div class="col-3"><img src="../html/zero data/shopping.png" alt="">Secure Checkout</div>
    </div>
    <!-- banner2 end -->
    <div class="life">
        <h1>Shop by LifeStyle</h1>
    </div>
    <div class="row selection " style="margin-top: 70px;">
        <div class="col"><a href="#"><img src="../html/zero data/professional.png" alt=""></a></div>
        <div class="col"><a href="#"><img src="../html/zero data/fitness.png" alt=""></a></div>
        <div class="col"><a href="#"><img src="../html/zero data/fashion.png" alt=""></a></div>
        <div class="col"><a href="#"><img src="../html/zero data/adventure.png" alt=""></a></div>
    </div>
    <!-- banner3 start -->
    <div class="banner3" style="margin-bottom: -60px;">
        <a href="#"><img src="../html/zero data/banner3.png" alt="Zbuds"></a>
    </div>
    <!-- banner3 end -->

    <!-- offer php start -->
    <div class="zoffer">
        <h3>Offer Of The Day</h3>
    </div>

    <?php

    include "connection1.php";

    $sql = "select * from `watches` where id IN (2, 3, 9, 11)";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>


            <!-- offer -->
            <form action="" method="post">
                <div class="zoffer">
                    <div class="offer" id="card-index-">
                        <img src="<?php echo $row['image'] ?>" alt="">
                        <h3><?php echo $row['Name'] ?></h3>
                        <p><?php echo $row['Description'] ?></p>
                        <hr>
                        <p>Color:<?php echo $row['Color'] ?></p>
                        <h4>Rs.<?php echo number_format( $row['Price'] )?></h4>
                        <input type="hidden" name="product_name" value="<?php echo $row['Name'] ?>">
                        <input type="hidden" name="product_price" value="<?php echo $row['Price'] ?>">
                        <input type="hidden" name="product_image" value="<?php echo $row['image'] ?>">
                        <p><span> <strike><?php echo $row['Discount'] ?> </strike><b style="text-decoration: none; color: red;"><?php echo $row['percentage'] ?> </b></span>
                            <input type="submit" class="submit_btn cart_btn" id="hover-btn-color" value="Add to Cart" name="add_to_cart">
                        </p>
                    </div>
                </div>
            </form>
            <!-- offer -->

    <?php
        }
    } else {
        echo "data not found";
    }

    ?>
    <!-- offer php end -->

    <!-- banner4 -->
    <div class="banner4">
        <a href="#"><img src="../html/zero data/banner4.png" alt=""></a>
    </div>
    <!-- banner4 -->
    <!-- details start -->
    <div class="details">
        <h3>Zero Lifestyle - A technological Lifestyle revolution is on the horizon</h3>
        <p>Everything revolutionary has begun from Zero. From the singularity to the big bang, and from the earth to the greatest feat of the human race – The wheel, everything has conceived its shape from ZERO. The Lifestyle revolution is here – And it is starting from Zero all over again! <br><br>

            Zero Lifestyle is not just a tech brand, not just a manufacturer of zero smart watches or tech products, but rather the harbinger of a new age of reformation. Every Zero Lifestyle product is manufactured with the intent of revolutionizing life as we know it. <br> <br>

            At ZeroLifestyle, we're committed to offering you the Best Smart Watches in Pakistan, the perfect blend of style and technology, right at your wrists. Our diverse selection of Zero Branded Smart Watches stands as a testament to our dedication in providing superior quality and innovative features at a price that doesn't break the bank.</p>
        <h3>Zero Lifestyle Smart Watch</h3>
        <p>Zero Lifestyle smart watches are your for-life companions. They’re techy, aesthetically alluring, and functionally on-spot! Think of these Zero watches as compact versions of your smartphone. All the basic smartphone functionality is always tied around your wrist, and to make it even better, the Zero Lifestyle smartwatches come with enhanced features you only find on the best android smart watches or even the most premium iPhone smart watch range.

        </p>
        <h3>Zero’s Versatile Arsenal– Android Smart Watch and iOS Supported Smart Watches</h3>
        <p>Whether you're an Android enthusiast or an Apple aficionado, we have you covered. Every zero watch is designed to be the perfect Android Smart Watch, along with being an iOS Supported Smart Watch. How is that possible? Our proprietary built-in Zero OS is a multiplatform phenomenon that seamlessly connects with different smartphone operation systems, hence giving you the best of both worlds. Welcome to a world where technology and fashion intersect. Welcome to ZeroLifestyle.co, the home of the Best Smartwatches in Pakistan. Browse through our extensive collection of smartwatches and enjoy the convenience of buying your Smart Watch Online in Pakistan.

        </p>
        <h3>Best Smart Watches in Pakistan</h3>
        <p>We take pride in bringing in our diverse range of Best Smart Watches in Pakistan. Our selection includes everything from sleek and stylish designs to feature-packed powerhouses, all aimed at enriching your lifestyle. Whether you're a fitness enthusiast, a busy professional, or a tech-savvy trendsetter, we've got a smart watch just for you.

        </p>
        <h3>Zero Lifestyle Smart Watch Price in Pakistan</h3>
        <p>Branded smart watches in Pakistan have always cost a fortune. Starting prices for smart watches in Pakistan range between Rs 20,000 to over Rs 150,000. Anything below these price listings is either a cheap smart watch or a shoddy imitation of a premium smart watch. <br>

            Zero lifestyle prices its smart watches at an unbelievable proposition! The functionality is upper-grade. Aesthetics are as good as they can get. And the features are beyond what even mid-range smart watches (Rs 35,000 – Rs 60,000) offer! <br>

            Zero lifestyle smart watch price in Pakistan is just under Rs 10,000 for its most high-end offering. All the other variants are for less, and pack remarkable smart watch features like BT calling, fitness tracking, and over 150 smart watch dial faces. To sum it up, if you’re looking for the best smart watches in Pakistan under Rs, 10,000, you don’t have to go beyond zero! We offer everything for you at a price point you would’ve never imagined!</p>
        <h3>Zero Lifestyle Official Store in Pakistan</h3>
        <p>Zero Lifestyle is the official manufacturer and distributor of all Zero smart watches and other lifestyle products. We take absolute pride in being the first revolutionary tech brand in Pakistan that provides state of the art smartwatches, accessories, and other lifestyle offerings at the most affordable of prices. <br>

            All the products at Zero Lifestyle come with brand warranty, and can be easily replaced, or refunded, as per customer’s disposition, free of any charge! <br>

            Tech enthusiasts for years have raged over tech products breaking the bank. Well, not anymore! With Zero watch making it to Pakistan, the tech landscape in Pakistan is getting a makeover. At Zero Lifestyle, we have the sauce, the sassiness, and the story. Mark your calendars, join the reformation today, and become a part of the biggest tech lifestyle revolution in Pakistan at Zero Lifestyle!</p> <br>

    </div>
    <!-- details end -->
    <!-- main website -->

    <!-- website footer start -->
    <div class="row newsletter" style="margin-left: 0px;">
        <div class="col-6">
            <h3>Sign Up For Our newsletter</h3>
            <h5>Be the first own to know about our offers, product launch and events.</h5>
        </div>
        <div class="col-6">
            <form action="#"><input class="input" type="email" placeholder="Enter Your Email" name="" id=""><input class="submit" type="submit" value="Subscribe"></form>
        </div>
    </div>

    <footer class="footer" style="margin-left: 130px;margin-top:30px;">
        <div class="row">
            <div class="col margin">
                <ul>
                    <li><a href="./index.php"><img src="../html/zero data/zero logo1.png" alt="logo" class="logo"></a></li>
                    <li>
                        <h4 style="margin-bottom: 0;">Follow Us</h4n>
                    </li>
                    <li>
                        <i class="social-icons fa-brands fa-facebook"></i>
                        <i class="social-icons fa-brands fa-whatsapp"></i>
                        <i class="social-icons fa-brands fa-x-twitter"></i>
                    </li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <li>
                        <h4>Quick Links <div class="underline"><span></span></div>
                        </h4>
                    </li>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./responsiveWatches.php">SmartWatches</a></li>
                    <li><a href="#">Blogs</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <li>
                        <h4>Support <div class="underline"><span></span></div>
                        </h4>
                    </li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Track Your Order</a></li>
                    <li><a href="#">Warranty Registration</a></li>
                    <li><a href="#">Shipping Details</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="col" style="margin-right: -100px;">
                <ul>
                    <li>
                        <h4>Policy <div class="underline"><span></span></div>
                        </h4>
                    </li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Warranty Policy</a></li>
                    <li><a href="#">Return Policy</a></li>
                    <li><a href="#">Corporate Policy</a></li>
                </ul>
            </div>
            <hr class="line">
            <p class="Copyright">Copyright ©2024 All rights reserved|</p>
        </div>
    </footer>
    <!-- website footer end -->
</body>

</html>