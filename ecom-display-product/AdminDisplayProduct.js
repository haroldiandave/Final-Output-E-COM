
var modal = document.getElementById("add-product-modal");


var btn = document.getElementById("add-product-btn");


var span = document.getElementsByClassName("close")[0];


btn.onclick = function() {
  modal.style.display = "block";
}


span.onclick = function() {
  modal.style.display = "none";
}


window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}



// Handle form submission
document.getElementById("add-product-modal").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent default form submission

  // Get form values
  var productName = document.getElementById("product-name").value;
  var productPrice = document.getElementById("product-price").value;
  var productQuantity = document.getElementById("product-quantity").value;

  // Create a FormData object to send form data to server
  var formData = new FormData();
  formData.append('productName', productName);
  formData.append('productPrice', productPrice);
  formData.append('productQuantity', productQuantity);

  // Send form data to server using fetch API
  fetch('Add-product.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    // Display success message
    alert("Added New Product Successfully!");
    console.log(data);
  })
  .catch(error => {
    console.error('Error:', error);
  });

  // Close the modal after submission
  modal.style.display = "none";
});

// Select all "Add to Cart" buttons
var addToCartButtons = document.querySelectorAll(".add-btn");

// Loop through each button and add click event listener
addToCartButtons.forEach(function(button) {
  button.addEventListener("click", function(event) {
    // Get the product details from the clicked product box
    var productBox = event.target.closest(".product-box");
    var productName = productBox.querySelector(".product-title").textContent;
    var productPrice = productBox.querySelector(".price").textContent;
    var productQuantity = productBox.querySelector(".quantity-input").value;
    
    
    var formData = new FormData();
    formData.append('productName', productName);
    formData.append('productPrice', productPrice);
    formData.append('productQuantity', productQuantity);

    
    fetch('Add-product.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      
      alert("Added New Product Successfully!");
      console.log(data);
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });
});





// Get the edit modal
var editModal = document.getElementById("edit-product-modal");

// Get the button that opens the edit modal
var editButtons = document.querySelectorAll(".edit-btn");

// Get the <span> element that closes the edit modal
var editClose = document.getElementById("edit-close");

// When the user clicks on the edit button, open the edit modal
editButtons.forEach(function(button) {
  button.onclick = function() {
    // Retrieve the product details from the clicked product box
    var productBox = button.closest(".product-box");
    var productId = productBox.id.split("-")[1];
    var productName = productBox.querySelector(".product-title").textContent;
    var productPrice = productBox.querySelector(".price").textContent;
    var productQuantity = productBox.querySelector(".quantity-input").value;

    // Fill the edit modal with product details
    document.getElementById("edit-product-id").value = productId;
    document.getElementById("edit-product-name").value = productName;
    document.getElementById("edit-product-price").value = productPrice;
    document.getElementById("edit-product-quantity").value = productQuantity;

    // Open the edit modal
    editModal.style.display = "block";
  }
});

// When the user clicks on <span> (x) in the edit modal, close the edit modal
editClose.onclick = function() {
  editModal.style.display = "none";
}

// When the user clicks anywhere outside of the edit modal, close it
window.onclick = function(event) {
  if (event.target == editModal) {
    editModal.style.display = "none";
  }
}

// Handle form submission for editing product
document.getElementById("edit-product-modal").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent default form submission

  // Get form values
  var productId = document.getElementById("edit-product-id").value;
  var productName = document.getElementById("edit-product-name").value;
  var productPrice = document.getElementById("edit-product-price").value;
  var productQuantity = document.getElementById("edit-product-quantity").value;

  // Create FormData object to send form data to server
  var formData = new FormData();
  formData.append('productId', productId);
  formData.append('productName', productName);
  formData.append('productPrice', productPrice);
  formData.append('productQuantity', productQuantity);

  // Send form data to server using fetch API
  fetch('Update-product.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    // Display success message
    alert("Product Updated Successfully!");
    console.log(data);

    // Update product details in the interface
    var productBox = document.getElementById("product-" + productId);
    productBox.querySelector(".product-title").textContent = productName;
    productBox.querySelector(".price").textContent = productPrice;
    productBox.querySelector(".quantity-input").value = productQuantity;
  })
  .catch(error => {
    console.error('Error:', error);
  });

  // Close the edit modal after submission
  editModal.style.display = "none";
});
