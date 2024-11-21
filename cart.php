<?php
include "connection1.php";  // Ensure your database connection is correct

if (isset($_POST['update_product_quantity'])) {
    // Sanitize and cast values to integers to avoid SQL injection
    $update_value = (int)$_POST['update_quantity'];
    $update_id = (int)$_POST['update_quantity_id'];

    // Check if the quantity column exists in the correct table (adjust if needed)
    $update_quantity_query = mysqli_query(
        $conn,
        "UPDATE `cart` SET `quantity` = '$update_value' WHERE `id` = '$update_id'"
    );

    if ($update_quantity_query) {
        header('Location: cart.php');  // Redirect to cart page after successful update
    } else {
        echo "Error updating quantity: " . mysqli_error($conn);  // Display error if query fails
    }
}
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];

    $remove_querry = mysqli_query($conn, "DELETE FROM `cart` WHERE id= '$remove_id'");
    header('location:cart.php');
}
if (isset($_GET['delete_all'])) {

    $delete_all_querry = mysqli_query($conn, "DELETE FROM `cart`");
    header('location:cart.php');
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="ar-icon" href="../html/zero data/zerofavicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/c1f14054f5.js" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/cart styling.css">

</head>

<body>

    <?php include 'navbar.php'; ?>
    <div class="container">
        <section class="shopping_cart">
            <h1 class="heading">My Cart</h1>
            <table>
                <?php
                include "connection1.php";
                $select_cart_products = mysqli_query($conn, "Select * from `cart`");
                $num = 1;
                $grandtotal = 0;
                if (mysqli_num_rows($select_cart_products) > 0) {
                    echo "
                    <thead>
                    <th style='background-color:Black;'>SI No</th>
                    <th style='background-color:Black;'>Product Name</th>
                    <th style='background-color:Black;'>Product Image</th>
                    <th style='background-color:Black;'>Product Price</th>
                    <th style='background-color:Black;'>Product Quantity</th>
                    <th style='background-color:Black;'>Total Price</th>
                    <th style='background-color:Black;'>Action</th>
                </thead>
                <tbody>
                ";
                    while ($fetch_cart_products = mysqli_fetch_assoc($select_cart_products)) {
                ?>
                        <tr>
                            <td><?php echo $num; ?></td>
                            <td><?php echo $fetch_cart_products['name']; ?></td>
                            <td>
                                <img src="<?php echo $fetch_cart_products['image']; ?>" alt="">
                            </td>
                            <td style="text-transform: none;">Rs.<?php echo number_format($fetch_cart_products['price']); ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" value="<?php echo $fetch_cart_products['id']; ?>" name="update_quantity_id">
                                    <div class="quantity_box">
                                        <input style="padding-left: 35px;" type="number" min="1" value="<?php echo $fetch_cart_products['quantity']; ?>" name="update_quantity">
                                        <input type="submit" class="update_quantity" value="Update" name="update_product_quantity">
                                    </div>
                                </form>
                            </td>
                            <td style="text-transform: none;">Rs.<?php echo number_format(((float)$fetch_cart_products['price']  *  (float)$fetch_cart_products['quantity']))  ?></td>
                            <td>
                                <a style="text-decoration: none;color:red;" href="cart.php?remove=<?php echo $fetch_cart_products['id'] ?>" onclick="return confirm('Are you sure? You want to remove this item.')">
                                    <i class="fas fa-trash-alt" style="color: red;"></i>
                                    Remove
                                </a>
                            </td>
                        </tr>
                <?php
                        $grandtotal = $grandtotal + ((float)$fetch_cart_products['price']  *  (float)$fetch_cart_products['quantity']);
                        $num++;
                        $formattedGrandTotal = number_format($grandtotal);
                    }
                } else {
                    echo "<div class='empty_text' style='background-color:Black;Color:white;padding: 0.8rem 0.5rem;font-size:1.7rem;''>Cart is empty</div>";
                }
                ?>


                </tbody>
            </table>
            <?php
            if ($grandtotal > 0) {
                echo "  <!-- bottom area -->
  <div class='table_bottom' style='background-color:Transparent;'>
                <a href='homepage.php' class='bottom_btn' style='background-color:Black;color:White;'> Continue Shopping </a>
                <h3 class='bottom_btn' style='margin-bottom: -1.5px;text-transform: none;background-color:Black;color:White;'>Grand Total :Rs.<span style='color:White;'>$formattedGrandTotal/-</span></h3>
                <a href='checkout.php' class='bottom_btn' style='background-color:Black;color:White;'>Proceed To Checkout</a>
            </div>
            ";

            ?>

                <a href='cart.php?delete_all' class='delete_all_btn' onclick="return confirm('Are you sure! You want to delete all items from cart.')"><i class='fas fa-trash'></i>Delete All</a>
            <?php
            } else {
                echo "";
            }

            ?>
        </section>
    </div>


</body>

</html>