<?php
include "connection1.php";

$FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
$LastName = mysqli_real_escape_string($conn, $_POST['LastName']);
$Email = mysqli_real_escape_string($conn, $_POST['Email']);
$Password = mysqli_real_escape_string($conn, $_POST['Password']);
$male = mysqli_real_escape_string($conn, $_POST['male']);
$female = mysqli_real_escape_string($conn, $_POST['female']);
$custom = mysqli_real_escape_string($conn, $_POST['custom']);

// Get the date of birth values
$day = mysqli_real_escape_string($conn, $_POST['Day']);
$month = mysqli_real_escape_string($conn, $_POST['Month']);
$year = mysqli_real_escape_string($conn, $_POST['Year']);

// Combine into a date string (YYYY-MM-DD)
$DateOfBirth = "$year-$month-$day";

$sql = "INSERT INTO `users`(`First Name`, `Last Name`, `Email`, `Password`, `DateOfBirth`, `male`, `female`, `custom`)
        VALUES ('$FirstName', '$LastName', '$Email', '$Password', '$DateOfBirth', '$male', '$female', '$custom')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "New record created successfully";
    header("Location: signin.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
