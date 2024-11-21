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
    <title>TIMEZONE BUDS</title>
    <link rel="stylesheet" href="../css/navbar style.css">
    <link rel="stylesheet" href="../css/mainwebsite style.css">
    <link rel="stylesheet" href="../css/cart styling.css">
    <link rel="stylesheet" href="../css/search modal.css" class="">

</head>

<body>
    <!-- website navigation bar start -->
    <div class="nav header_body">
        <div class="logodiv">
            <a class="logo1" href="../html/index.php"><img src="../html/zero data/zero logo.png"></a>
        </div>
        <div class="centerelements">
            <a href="../html/index.php">Home</a>
            <a style="margin-left: -60px;" href="responsiveWatches.php">SmartWatches</a>
            <a style="margin-left: -60px;" href="responsivezbuds.php">Earbuds</a>
            <a style="margin-left: -60px;" href="../html/support.php">Support</a>
        </div>
        <div class="leftside">
            <a href="../html/signin.php"><img src="../html/zero data/black user.png" alt=""></a>

            <!-- Button to open search Modal start-->
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#iModal">

                <img src="../html/zero data/black search.png" alt="" style="padding: 10px;width: 55px;margin-top: -6px; margin-left: -15px;">
            </button>

            <!-- The Modal -->
            <div class="modal fade" id="iModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title"><input type="search" placeholder="Search"></h4>
                            <button class="cross" type="button" data-bs-dismiss="modal">&#10005</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <h6 style="font-size: 16px;">Quick Links</h6>
                            <a href="../Rashid/web0/html/buds.html">Wireless Earbuds</a> <br>
                            <a href="../Rashid/web0/html/watches.html">Smart Watches</a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- button to close search model end -->

            <!-- select querry -->
            <?php
            $select_product = mysqli_query($conn, "Select * from `cart`") or die('query failed');
            $row_count = mysqli_num_rows($select_product);
            ?>
            <!-- shopping cart icon -->
            <a href="cart.php" class="headerbodycart" style="margin-right: 35px; padding: 10px; width: 55px; margin-top: -6px; margin-left: -25px;"><i class="fa-solid fa-cart-shopping"></i><span><sup><?php echo "$row_count"; ?></sup></span></a>
        </div>
    </div>
    <!-- website navigation bar end -->