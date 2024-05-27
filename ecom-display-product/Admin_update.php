<?php

@include 'config.php';

// Check if 'edit' parameter is provided in the URL
if(isset($_GET['edit'])) {
    $id = $_GET['edit'];

    // Fetch product details based on the provided ID
    $select = mysqli_query($db, "SELECT * FROM products WHERE id = $id");

    // Check if the product exists
    if($select && mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
    } else {
        // Handle error if product with given ID is not found
        echo "Product not found.";
        exit; // Stop further execution
    }
} else {
    // Handle error if 'edit' parameter is not provided in the URL
    echo "Product ID not provided.";
    exit; // Stop further execution
}

// Process form submission if the form is submitted
if(isset($_POST['update_product'])) {
    // Retrieve form data
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    // Handle image update separately if necessary

    // Update product details in the database
    $update = "UPDATE products SET name='$product_name', price='$product_price', quantity='$product_quantity' WHERE id=$id";
    $upload = mysqli_query($db, $update);

    // Check if the update was successful
    if($upload) {
        // Redirect to Admin page after successful update
        header('Location: Admin.php');
        exit; // Stop further execution
    } else {
        // Handle error if the update fails
        $message[] = 'Could not update the product.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIKE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="styles/admin.css">
</head>
<body>

    <?php
    // Display error messages if any
    if(isset($message)) {
        foreach($message as $msg) {
            echo '<span class="message">'.$msg.'</span>';
        }
    }
    ?>

<div class="container">
    <div class="admin-product-form-container centered">
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?edit=' . $id; ?>" method="post" enctype="multipart/form-data">
            <h3>Update Product</h3>
            <input type="text" placeholder="Enter product name" value="<?php echo $row['name']; ?>" name="product_name" class="box">
            <input type="text" placeholder="Enter product price" value="<?php echo $row['price']; ?>" name="product_price" class="box">
            <input type="number" placeholder="Enter product quantity" value="<?php echo $row['quantity']; ?>" name="product_quantity" class="box">
            <!-- Add file input for updating product image -->
            <label for="product_image">Choose Product Image:</label>
            <input type="file" id="product_image" name="product_image" accept="image/png, image/jpeg, image/jpg" class="box">
            <input type="submit" class="btn" name="update_product" value="Update Product">
            <a href="Admin.php" class="btn">Back to Admin Page</a>
        </form>
    </div>
</div>


</body>
</html>
