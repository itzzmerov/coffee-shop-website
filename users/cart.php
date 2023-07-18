<?php
// Establish connection to the database
include 'db.php';

// Get data sent from AJAX
$data = json_decode(file_get_contents("php://input"), true);

$currentDate = date('Y-m-d');

// Insert data into database
foreach ($data as $item) {
    $title = $item["title"];
    $price = $item["price"];
    $quantity = $item["quantity"];
    $total = $item["total"];
    $sql = "INSERT INTO cart (title, price, quantity, total, date_created) VALUES ('$title', '$price', '$quantity', '$total', '$currentDate')";
    $conn->query($sql);
}

// Close connection
$conn->close();
?>