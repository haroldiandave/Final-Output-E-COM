
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/AdminDisplayProduct.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">    
        <title>NIKE</title>
    </head>
        <body>
            <header>
                <div class="nav container">
                    <?php echo '<img src="assets/nikelogo.png" alt="Logo" class="logo-nike">' ?>
                    <?php echo '<a href="#" class="logo" onclick="window.location.href=\'Client.php\'">Product List</a>' ?>
                    <?php echo '<button id="add-product-btn" class="admin-link">Add Product</button>'?>
                    <?php echo '<i class=\'bx bx-shopping-bag\' id="cart-icon"></i>' ?>
                </div>    
            </header>
    
            <section class="shop-container">
                <?php echo '<h2 class="section-title">Shop Products</h2>' ?>
            </section>
    
            <div class="shop-content">

                <div class="product-box" id="product-1">
                    <?php echo '<img src="assets/Nike Dunk Low.png" alt="" class="product-img">' ?>
                    <?php echo '<h2 class="product-title">Nike Dunk Low</h2>' ?>
                    <?php echo '<span class="price">₱5,495</span>' ?>
                    <div class="product-actions">
                        <button class="add-btn">Add</button>
                        <button class="delete-btn">Delete</button>
                        <input type="number" class="quantity-input" value="1" min="1">
                    </div>
                </div>
    
                <div class="product-box" id="product-2">
                    <?php echo '<img src="assets/Air Jordan Low SE.png" alt="" class="product-img">' ?>
                    <?php echo '<h2 class="product-title">Air Jordan Low SE</h2>' ?>
                    <?php echo '<span class="price">₱6,895</span>' ?>
                    <div class="product-actions">
                        <button class="add-btn">Add</button> 
                        <button class="delete-btn">Delete</button>
                        <input type="number" class="quantity-input" value="1" min="1">
                    </div>
                </div>

                <div class="product-box" id="product-3">
                    <?php echo '<img src="assets/Air Jordan 1 Low.png" alt="" class="product-img">' ?>
                    <?php echo '<h2 class="product-title">Air Jordan 1 Low</h2>' ?>
                    <?php echo '<span class="price">₱6,195</span>' ?>
                    <div class="product-actions">
                        <button class="add-btn">Add</button> 
                        <button class="delete-btn">Delete</button>
                        <input type="number" class="quantity-input" value="1" min="1">
                    </div>
                </div>

                <div class="product-box" id="product-4">
                    <?php echo '<img src="assets/Nike AirForce 1 Essential.png" alt="" class="product-img">' ?>
                    <?php echo '<h2 class="product-title">Nike Air Force 1 Essential</h2>' ?>
                    <?php echo '<span class="price">₱4,125</span>' ?>
                    <div class="product-actions">
                        <button class="add-btn">Add</button>
                        <button class="delete-btn">Delete</button>
                        <input type="number" class="quantity-input" value="1" min="1">
                    </div>
                </div>

                <div class="product-box" id="product-5">
                    <?php echo '<img src="assets/Nike Dunk High By You.png" alt="" class="product-img">' ?>
                    <?php echo '<h2 class="product-title">Nike Dunk High By You</h2>' ?>
                    <?php echo '<span class="price">₱1,242</span>' ?>
                    <div class="product-actions">
                        <button class="add-btn">Add</button>
                        <button class="delete-btn">Delete</button>
                        <input type="number" class="quantity-input" value="1" min="1">
                    </div>
                </div>

                <div class="product-box" id="product-6">
                    <?php echo '<img src="assets/Air Jordan HighCut.png" alt="" class="product-img">' ?>
                    <?php echo '<h2 class="product-title">Air Jordan HighCut</h2>' ?>
                    <?php echo '<span class="price">₱5,615</span>' ?>
                    <div class="product-actions">
                        <button class="add-btn">Add</button>
                        <button class="delete-btn">Delete</button>
                        <input type="number" class="quantity-input" value="1" min="1">
                    </div>
                </div>

                <div class="product-box" id="product-7">
                    <?php echo '<img src="assets/Air Jordan 1 Retro High OG.png" alt="" class="product-img">' ?>
                    <?php echo '<h2 class="product-title">Air Jordan 1 Retro High OG</h2>' ?>
                    <?php echo '<span class="price">₱8,123</span>' ?>
                   
                    <div class="product-actions">
                         <button class="add-btn">Add</button>
                        <button class="delete-btn">Delete</button>
                        <input type="number" class="quantity-input" value="1" min="1">
                    </div>
                </div>

                <div class="product-box" id="product-8">
                    <?php echo '<img src="assets/Nike Blazzer Vintage.png" alt="" class="product-img">' ?>
                    <?php echo '<h2 class="product-title">Nike Blazzer Vintage</h2>' ?>
                    <?php echo '<span class="price">₱9,234</span>' ?>
                    <div class="product-actions">
                        <button class="add-btn">Add</button>
                        <button class="delete-btn">Delete</button>
                        <input type="number" class="quantity-input" value="1" min="1">
                    </div>
                </div>

                <div id="add-product-modal"  method="post" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Add New Product</h2>
                        <form id="add-product-form">
                            <input type="text" id="product-name" placeholder="Enter product name" required>
                            <input type="number" id="product-price" placeholder="Enter product price" required>
                            <input type="number" id="product-quantity" placeholder="Enter product quantity" required>
                            <button type="submit">Add Product</button>
                        </form>
                    </div>
                </div>

                <div id="edit-product-modal" method="post" class="modal">
                    <div class="modal-content">
                        <span id="edit-close" class="close">&times;</span>
                        <h2>Edit Product</h2>
                        <form id="edit-product-form">
                            <input type="hidden" id="edit-product-id" name="productId">
                            <div class="form-group">
                                <label for="edit-product-name">Product Name</label>
                                <input type="text" id="edit-product-name" name="productName" placeholder="Enter product name" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-product-price">Product Price</label>
                                <input type="number" id="edit-product-price" name="productPrice" placeholder="Enter product price" required>
                            </div>
                            <div class="form-group">
                                <label for="edit-product-quantity">Product Quantity</label>
                                <input type="number" id="edit-product-quantity" name="productQuantity" placeholder="Enter product quantity" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
            <script src="UserProducts.js"></script>
        </body>
    </html>