<?php

include('connection.php');


$stmt = $conn->prepare("SELECT * FROM products where product_category='watch' LIMIT 3");


$stmt->execute();


$watch_collections= $stmt->get_result();


?>

