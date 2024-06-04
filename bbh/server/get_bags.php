<?php


include('connection.php');


$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='Luxury' LIMIT 4");

$stmt->execute();

$Luxury = $stmt->get_result();


?>