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
        .signup .alpha{
            padding: 6px;
            width: 13.8%;
            margin-left: 36%;
            border: solid 1px;
            border-radius: 5px;
        }
        .signup .beta{
            padding: 6px;
            border: solid 1px;
            width: 13.8%;
            border-radius: 5px;
        }
        .signup .charlie{
            padding: 6px;
            width: 28%;
            border: solid 1px;
            margin-left: 36%;
            border-radius: 5px;
        }
        .signup .delta{
          padding: 6px;
          width: 28%;
            border: solid 1px;
            margin-left: 36%;
            border-radius: 5px;
        }
        .signup .eta{
            padding: 6px;
            width: 12%;
            margin-left: 35.5%;
            border-radius: 5px;
        }
        .signup .dob{
            padding: 6px;
            border: solid 1px;
            width: 9.2%;
            border-radius: 5px;
        }
        .signup .day{
            border: solid 1px;
            margin-left: 36%;
            border-radius: 5px;
        }
    </style>

</head>

<body>
    <?php include 'navbar.php'; ?>



    <!-- signup -->
     <br>
    <div class="signup">
        <h1 style="text-align: center;">Sign Up</h1>
    <p style="text-align: center;">It's quick and easy</p>
    <form action="../html/usersdata.php" method="post">
        <label for=""></label>
        <br>
        <input type="text" placeholder="First name" class="alpha" name="FirstName" required>
        <input type="text" placeholder="Last Name" class="beta" name="LastName">
        <br>
        <label for=""></label>
        <br>
        <input type="email" placeholder="Mobile number or Email address" class="charlie" name="Email" required>
        <br>
        <label for=""></label>
        <br>
        <input type="text" placeholder="Enter password" class="delta" name="Password" required>
        <br>
        <br>
        <label class="eta" for="">Date of birth </label>
        <br>
      <!-- Day Select -->
<select class="dob day" name="Day" required>
    <?php for ($i = 1; $i <= 31; $i++): ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    <?php endfor; ?>
</select>

<!-- Month Select -->
<select class="dob" name="Month" required>
    <option value="1">JAN</option>
    <option value="2">FEB</option>
    <option value="3">MAR</option>
    <option value="4">APR</option>
    <option value="5">MAY</option>
    <option value="6">JUN</option>
    <option value="7">JUL</option>
    <option value="8">AUG</option>
    <option value="9">SEP</option>
    <option value="10">OCT</option>
    <option value="11">NOV</option>
    <option value="12">DEC</option>
</select>

<!-- Year Select -->
<select class="dob" name="Year" required>
    <?php for ($i = 2024; $i >= 1900; $i--): ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    <?php endfor; ?>
</select>

<br>
        <br>
        <label style="margin-left: 36%;"for="">Gender</label>
        <br>
        <input style="margin-left: 36%; " type="radio" name="female" value="female">
        <label for="">Female</label>
        <input type="radio" name="male" value="male">
        <label for="">Male</label>
        <input type="radio" name="custom" value="custom">
        <label for="">Custom</label>
        <br>
        <p style="text-align: center; font-size: small;">
            <br>
            By clicking Sign Up, you agree to our Terms and Privacy Policy.
            <br>
            You may recieve SMS notifications from us and can opt out <br> at any time.
        </p>
        
        <input style="width: 15%;padding: 7px;border-radius: 10px;  color: white;border-width: 0px; background-color: black; margin-left: 43%" type="submit" value="Sign up">
    </form>
    <form action="../html/signin.html">
        <p style="padding-left: 43.8%; font-size: 14px;">Have an account?<input style="font-size: 15px;font-weight: bold; border-width: 0px;background-color: transparent; color: black;" type="submit" value="Sign in"> </p>
    </form>
    </div>
    <br>
    <!-- signup -->




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
                    <li><h4 style="margin-bottom: 0;">Follow Us</h4n></li> 
                    <li>
                        <i class="social-icons fa-brands fa-facebook"></i>
                        <i class="social-icons fa-brands fa-whatsapp"></i>
                        <i class="social-icons fa-brands fa-x-twitter"></i>
                    </li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <li><h4>Quick Links <div class="underline"><span></span></div></h4></li>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./responsiveWatches.php">SmartWatches</a></li>
                    <li><a href="#">Blogs</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <li><h4>Support <div class="underline"><span></span></div></h4></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Track Your Order</a></li>
                    <li><a href="#">Warranty Registration</a></li>
                    <li><a href="#">Shipping Details</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="col" style="margin-right: -100px;">
                <ul>
                    <li><h4>Policy <div class="underline"><span></span></div></h4></li>
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