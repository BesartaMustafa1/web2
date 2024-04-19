 // Define an empty cart array to store selected products
 let cart = [];

 // Function to add an item to the cart
 function addToCart(id, name, price) {
     // Check if the item is already in the cart
     let existingItem = cart.find(item => item.id === id);

     if (existingItem) {
         // If the item exists, increase its quantity
         existingItem.quantity++;
     } else {
         // If the item does not exist, add it to the cart
         cart.push({
             id: id,
             name: name,
             price: price,
             quantity: 1
         });
     }

     // Save the cart to local storage
     localStorage.setItem('cart', JSON.stringify(cart));

     // Display a confirmation message (Optional)
     alert('Product added to cart');

     // Optionally, you can redirect the user to the cart page after adding a product
     // window.location.href = 'cart.html';
 }

 // Load cart items from local storage on page load
 window.onload = function() {
     if (localStorage.getItem('cart')) {
         cart = JSON.parse(localStorage.getItem('cart'));
     }
 };function checkout() {
    // Clear cart
    localStorage.removeItem('cart');
    
    // Update cart display
    cart = []; // Reset cart array
    displayCart(); // Update cart display
 
    // Alert the user
    alert('Checkout successful! Your cart has been cleared.');
 }