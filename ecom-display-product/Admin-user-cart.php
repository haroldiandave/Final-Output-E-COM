<?php
session_start(); 

@include 'config.php';


if(isset($_GET['delete'])){
    $delete_index = $_GET['delete'];
    if(isset($_SESSION['cart'][$delete_index])){
        unset($_SESSION['cart'][$delete_index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); 
    }
    header('Location: AddtoCart.php'); 
    exit();
}

// Handle checkout
if(isset($_POST['checkout'])){
    // Here you can add code to process the checkout, e.g., saving the order to the database, clearing the cart, etc.

    // Clear the cart session after checkout
    $_SESSION['cart'] = array();

    // Display the checkout success message
    echo "<script>alert('Check out successfully!!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIKE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="styles/AddtoCart.css">
</head>

<body>
    <div class="container">
    <div class="navbar">
                <img src="assets/nikelogo.png" alt="Logo" class="logo-nike">
                <ul>
                    <li><a href="Admin.php">Previous Page</a></li>
                </ul>
        </div>

        <div class="cart-display">
            <h3>Product Cart</h3>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $index => $item){
                            echo "<tr>";
                            echo "<td><img src='uploaded_img/".$item['image']."' height='100' alt=''></td>";
                            echo "<td>".$item['name']."</td>";
                            echo "<td>".$item['price']."</td>";
                            echo "<td>".$item['quantity']."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No products in the cart.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
