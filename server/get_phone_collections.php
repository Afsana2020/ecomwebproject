<?php

include('connection.php');


$stmt = $conn->prepare("SELECT * FROM products LIMIT 4");


$stmt->execute();


$phone_collections= $stmt->get_result();


?>

