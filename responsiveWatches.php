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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zero Earbuds Price in Pakistan - The Fashion Tech Revolution</title>
    <link rel="shortcut icon" href="../html/zero data/zerofavicon.png" type="image/x-icon">



    <!-- Font Awesome, Bootstrap, and CSS Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for Styling -->
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        /* Page heading */
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #333;
        }

        /* Card styling */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        /* Product image */
        .card img {
            width: 100%;
            height: 40vh;
        }

        /* Product title */
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }

        /* Product description */
        .card-text {
            font-size: 0.9rem;
            color: #777;
            margin: 0;
        }

        /* Product price and discount */
        .price {
            font-size: 1.4rem;
            color: #333;
            font-weight: bold;
        }

        .discounted-price {
            font-size: 0.9rem;
            color: #666;
            text-decoration: line-through;
            margin-right: 5px;
        }

        .discount {
            font-size: 0.9rem;
            color: #ff3e3e;
            font-weight: bold;
        }

        /* Color text */
        .color-text {
            font-size: 1rem;
            color: #444;
        }

        /* Button styling */
        .cart_btn {
            background-color: #222;
            color: white;
            border-radius: 50px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        #hover-btn-color:hover{
            color: rgba(231, 229, 228, 0.893);
        }

        .cart_btn {
            text-align: center;
            padding: 0.6rem 0;
            font-size: 120%;
        }

        .cart_btn:hover {
            background-color: black;
            transform: translateY(-2px);
        }

        /* Spacing adjustments */
        .card-body {
            padding: 15px;
        }

        .card-footer {
            background: none;
            border-top: none;
            text-align: center;
        }

        /* Alert message styling */
        .alert {
            animation: fadeIn 0.5s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Footer Styling */
        .footer {
            background-color: rgba(0, 0, 0, 0);
            /* Fully transparent */
            color: black;
        }

        .footer h5 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .footer .underline {
            display: block;
            width: 100px;
            height: 3px;
            background-color: red;
            margin-bottom: 10px;
            border-radius: 2px;
        }

        .footer a {
            color: black;
            text-decoration: none;
        }

        .footer a:hover {
            color: red;
        }

        .footer .social-icons i {
            font-size: 1.5rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 576px) {
            .footer .row {
                text-align: center;
            }

            .footer .social-icons {
                justify-content: center;
            }
        }


        /* newsletter styling */
        .newsletter {
            max-width: 100%;
            background-color: black;
            height: 22.5vh;
        }

        .newsletter h3 {
            text-transform: uppercase;
            color: white;
            font-weight: normal;
            font-size: x-large;
            margin-top: 50px;
            margin-left: 40px;
        }

        .newsletter h5 {
            color: white;
            font-size: 17.6px;
            font-weight: 100;
            margin-left: 40px;
        }

        .newsletter .input {
            background-color: rgb(69, 63, 63);
            border-style: solid;
            border-color: white;
            border-width: 1px;
            border-radius: 2px;
            padding: 10px;
            width: 60%;
            margin-top: 55px;
            color: white;
        }

        .newsletter .submit {
            background-color: rgb(247, 49, 49);
            border-style: solid;
            border-color: red;
            border-width: 1px;
            border-radius: 1px 6px 6px 1px;
            padding: 10px;
            width: 20%;
            color: white;
            margin-top: 55px;
        }

        .footer .list-unstyled li {
            margin-top: 3px;
            color: black;
        }

        .footer .list-unstyled a:hover {
            text-decoration: underline;
            color: #ff3e3e;
        }

        .fab:hover {
            color: blue;
        }

        /* Responsive Styles */
        @media (max-width: 626px) {
            .newsletter h3 {
                margin-left: 20px;
                font-size: large;
            }

            .newsletter h5 {
                margin-left: 20px;
                font-size: 16px;
            }

            .newsletter .input {
                width: 60%;
                margin-top: 20px;
            }

            .newsletter .submit {
                width: 35%;
                margin-top: 45px;
            }

            .card {
                width: 60%;
                text-align: center;
                margin-left: 130px;
            }

            .card-body .row .addtocartbutton {
                padding: 10px;
            }

            .card-text {
                font-size: 17px;
            }

            .card-title {
                font-size: 28px;

            }

            .price {
                font-size: 22px;
            }

            .color-text {
                font-size: 17px;
            }

            .discount {
                font-size: 15px;
                margin-bottom: 20px;
            }

            .discounted-price {
                margin-bottom: 20px;
                font-size: 15px;
            }

            .card-body .row {
                display: flex;
                align-items: center;
                flex-direction: column;
                clear: both;

            }
        }

        @media (max-width: 850px) {
            .newsletter h3 {
                margin-left: 20px;
                font-size: large;
            }

            .newsletter h5 {
                margin-left: 20px;
                font-size: 16px;
            }

            .newsletter .input {
                width: 60%;
                margin-top: 20px;
            }

            .newsletter .submit {
                width: 35%;
                margin-top: 45px;
            }

            .card {
                width: 100%;
            }

            .card .addtocartbutton {
                padding-bottom: 10px;
                padding-right: 50px;
                padding-top: 0;
                padding-left: 0;
                margin-top: 0;
                margin-left: 0;
            }
        }

        @media (max-width: 650px) {
            .newsletter h3 {
                margin-top: 20px;
                margin-left: 10px;
                font-size: 18px;
            }

            .newsletter h5 {
                margin-left: 10px;
                font-size: 12px;
            }

            .newsletter .input {
                width: 60%;
                margin-top: 20px;
            }

            .newsletter .submit {
                width: 35%;
                margin-top: 45px;
            }

            .card {
                width: 60%;
            }
        }

        @media (max-width: 480px) {
            .newsletter h3 {
                margin-top: 12px;
                margin-left: 10px;
                font-size: 16px;
            }

            .newsletter h5 {
                margin-left: 10px;
                font-size: 11px;
            }

            .newsletter .input {
                width: 60%;
                margin-top: 20px;
            }

            .newsletter .submit {
                width: 35%;
                margin-top: 45px;
            }

            .card {
                width: 60%;
            }
        }

        @media (max-width: 430px) {
            .newsletter h3 {
                margin-top: 12px;
                margin-left: 10px;
                font-size: 16px;
            }

            .newsletter h5 {
                margin-left: 10px;
                font-size: 11px;
            }

            .newsletter .input {
                width: 60%;
                margin-top: 20px;
            }

            .newsletter .submit {
                width: 35%;
                margin-top: 45px;
            }

            .card {
                width: 90%;
                margin-left: auto;
                margin-right: auto;
            }
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

    <div class="container text-center mt-3 bg-transparent" style="padding:0;">
        <h2>Zero SmartWatches Price in Pakistan - The Fashion Tech Revolution</h2>
    </div>

    <div class="container-fluid mt-4">
        <div class="row">
            <?php
            $sql = "SELECT * FROM `watches`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-12 col-md-4 col-lg-3 mb-3">
                        <form action="" method="post">
                            <div class="card h-100" style="background-color: rgba(231, 229, 228, 0.893);">
                                <img src="<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['Name']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($row['Description']); ?></p>
                                    <hr>
                                    <p class="color-text">Color: <?php echo htmlspecialchars($row['Color']); ?></p>
                                    <h4 class="price">Rs. <?php echo number_format($row['Price']); ?></h4>

                                    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($row['Name']); ?>">
                                    <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($row['Price']); ?>">
                                    <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($row['image']); ?>">

                                    <div class="row">
                                        <div class="col-7 p-2" style="margin-bottom: -15px;">
                                            <p>
                                                <span class="discounted-price"><?php echo htmlspecialchars($row['Discount']); ?></span>
                                                <span class="discount"><?php echo htmlspecialchars($row['percentage']); ?></span>
                                            </p>
                                        </div>
                                        <div class="col-5 ms-0 me-0 addtocartbutton" style="margin-bottom: -15px;">
                                            <input style="margin-left: -10px;width:fit-content;padding:8px;font-size:17px;" type="submit" id="hover-btn-color" class="submit_btn cart_btn" value="Add to Cart" name="add_to_cart">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            <?php
                }
            } else {
                echo "<p class='text-center'>No Products available</p>";
            }
            ?>
        </div>
    </div>


    <div class="row newsletter">
        <div class="col-6">
            <h3>Sign Up For Our newsletter</h3>
            <h5>Be the first own to know about our offers, product launch and events.</h5>
        </div>
        <div class="col-6">
            <form action="#"><input class="input" type="email" placeholder="Enter Your Email" name="" id=""><input class="submit" type="submit" value="Subscribe"></form>
        </div>
    </div>


    <!-- Footer Section -->
    <footer class="footer py-2">
        <div class="container text-center text-md-start" style="background-color: transparent;">
            <div class="row">
                <!-- Logo and Social Icons -->
                <div class="col-md-3 mb-4 mb-md-0">
                    <a href="./index.php">
                        <img src="../html/zero data/zero logo1.png" alt="Logo" class="mb-3" style="width: 170px;">
                    </a>
                    <p style="font-size:18px;font-weight:bold;margin-bottom:-0.5px;">Follow Us</p>
                    <div>
                        <a href="#" style="font-size:30px;" class="text-dark me-2"><i class="fab fa-facebook"></i></a>
                        <a href="#" style="font-size:30px;" class="text-dark me-2"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" style="font-size:30px;" class="text-dark"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5>Quick Links <span class="underline"></span></h5>
                    <ul class="list-unstyled">
                        <li><a href="./index.php" class="text-dark">Home</a></li>
                        <li><a href="./responsiveWatches.php" class="text-dark">SmartWatches</a></li>
                        <li><a href="#" class="text-dark">Blogs</a></li>
                        <li><a href="#" class="text-dark">Contact</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5>Support <span class="underline"></span></h5>
                    <ul class="list-unstyled ">
                        <li><a href="#" class="text-dark">FAQs</a></li>
                        <li><a href="#" class="text-dark">Track Your Order</a></li>
                        <li><a href="#" class="text-dark">Warranty Registration</a></li>
                        <li><a href="#" class="text-dark">Shipping Details</a></li>
                        <li><a href="#" class="text-dark">Terms & Conditions</a></li>
                    </ul>
                </div>

                <!-- Policy -->
                <div class="col-md-3">
                    <h5>Policy <span class="underline"></span></h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-dark">Privacy Policy</a></li>
                        <li><a href="#" class="text-dark">Warranty Policy</a></li>
                        <li><a href="#" class="text-dark">Return Policy</a></li>
                        <li><a href="#" class="text-dark">Corporate Policy</a></li>
                    </ul>
                </div>
            </div>

            <hr class="mt-4">
            <p class="text-center">Copyright ©2024 All rights reserved</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>