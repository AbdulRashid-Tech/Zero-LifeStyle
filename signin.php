<?php
ob_start(); // Start output buffering
include "connection1.php"; // Ensure the connection file does not produce output

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$message = ''; // Variable to store the message

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Use prepared statements for security
    $stmt = $conn->prepare("SELECT `Email`, `Password` FROM `users` WHERE `Email` = ? AND `Password` = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result(); // Get the result object

    // Check the number of rows returned
    if ($result->num_rows > 0) {
        // Redirect after successful login
        echo "Login successful";
        header("Location:homepage.php");
        exit(); // Ensure no further code is executed
    } else {
        $message = "Email or Password is incorrect.";
    }

    $stmt->close();
}

ob_end_flush(); // End output buffering and flush output
?>





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
    <link rel="shortcut icon" type="ar-icon" href="../img/zerofavicon.png">
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
    <link rel="stylesheet" href="../css/signin.css">
    <link rel="stylesheet" href="../css/cart styling.css">
    <link rel="stylesheet" href="../css/search modal.css" class="">
    <link rel="stylesheet" href="../css/footer style.css">

    <style>
        /* Responsive adjustments for smaller screens */
        @media (max-width: 768px) {
            .wrapper {
                width: 100%;
                margin-left: 0;
                padding: 20px;
            }

            .signin {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin: 50px 20px;
            }

            .wrapper h1 {
                font-size: 32px;
                margin-bottom: 40px;
            }

            .input-box {
                margin: 10px 0;
            }

            .btn1 {
                height: auto;
                padding: 15px;
            }

            .register-link {
                font-size: 14px;
                margin: 15px;
            }

            .remember-forgot {
                font-size: 13px;
                flex-direction: column;
                align-items: flex-start;
            }
        }


        /* Base styling for larger screens is already defined */

        /* Tablet devices (between 768px and 1024px) */
        @media (max-width: 1024px) {
            .wrapper {
                width: 75%;
                margin-left: 0;
                padding: 25px;
            }

            .signin {
                margin: 80px auto;
            }

            .wrapper h1 {
                font-size: 34px;
                margin-bottom: 50px;
            }

            .btn1 {
                padding: 12px;
                font-size: medium;
            }

            .remember-forgot {
                font-size: 14px;
            }
        }

        /* Mobile devices (between 480px and 768px) */
        @media (max-width: 768px) {
            .wrapper {
                width: 90%;
                padding: 20px;
                margin: 0 auto;
            }

            .signin {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin: 50px auto;
            }

            .wrapper h1 {
                font-size: 28px;
                margin-bottom: 35px;
            }

            .input-box {
                margin: 8px 0;
            }

            .btn1 {
                height: auto;
                padding: 12px;
                font-size: 16px;
            }

            .remember-forgot {
                font-size: 13px;
                flex-direction: column;
                align-items: flex-start;
            }

            .register-link {
                font-size: 14px;
                margin: 15px;
            }
        }

        /* Small mobile devices (below 480px) */
        @media (max-width: 480px) {
            .wrapper {
                width: 95%;
                padding: 15px;
            }

            .wrapper h1 {
                font-size: 24px;
                margin-bottom: 30px;
            }

            .input-box input {
                font-size: 14px;
                padding: 8px;
            }

            .btn1 {
                padding: 10px;
                font-size: 14px;
            }

            .remember-forgot {
                font-size: 12px;
                margin-top: 10px;
                flex-direction: column;
                align-items: flex-start;
            }

            .register-link {
                font-size: 13px;
                margin: 10px;
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
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>


    <!-- login -->
    <div class="signin wrapper">
        <form action="#" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="email" placeholder="Email" required name="email" value="<?php echo htmlspecialchars($email); ?>">
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required name="password">
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label for=""><input type="checkbox"> Remember Me</label>
                <a href="#">Forgot Password</a>
            </div>
            <button type="submit" class="btn1">Sign in</button>
            <div class="register-link">
                <p>Don't have an account?<a href="../html/sign up.php">Register</a></p>
            </div>
            <?php if ($message): ?>
                <p style="color: red;"><?php echo htmlspecialchars($message); ?></p>
            <?php endif; ?>
        </form>
    </div>
    <!-- login -->

    <?php
    ob_end_flush(); // End output buffering and flush output
    ?>



    <!-- website footer start -->
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
    <!-- website footer end -->
</body>

</html>