<?php

include('connection.php');


$stmt = $conn->prepare("SELECT * FROM products where product_category='laptop' LIMIT 4");


$stmt->execute();


$laptop_collections= $stmt->get_result();


?>

