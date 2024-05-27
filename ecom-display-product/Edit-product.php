<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['productQuantity'];

   
    $sql = "UPDATE product_table SET product_name = '$productName', product_price = '$productPrice', product_quantity = '$productQuantity' WHERE id = $productId";
    
    if (mysqli_query($db, $sql)) {
        
        echo json_encode(['success' => true]);
    } else {
       
        echo json_encode(['success' => false, 'error' => mysqli_error($db)]);
    }
}
?>
