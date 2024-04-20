<?php
// Load header
echo "<script>$('#header').load('../header/header.html');</script>";

// Retrieve cart items from local storage
$cart = json_decode($_COOKIE['cart']) ?? [];

// Function to display cart items
echo "<script>";
echo "let cartItemsHtml = '';";
echo "let totalPrice = 0;";

echo "cart.forEach(item => {";
echo "let totalItemPrice = item->price * item->quantity;";
echo "totalPrice += totalItemPrice;";

echo "cartItemsHtml += `<tr>
          <td>${item->name}</td>
          <td>$${item->price}</td>
          <td>${item->quantity}</td>
          <td>$${totalItemPrice}</td>
        </tr>`;";
echo "});";

echo "$('#cart-items').html(cartItemsHtml);";
echo "$('#total-price').text(totalPrice.toFixed(2));";
echo "</script>";

// Function to handle checkout
echo "<script>";
echo "function checkout() {";
echo "alert('The purchase was completed successfully, you can continue.');";
echo "// You can redirect the user to a checkout page or clear the cart after checkout";
echo "// For example:";
echo "localStorage.removeItem('cart');";
echo "window.location.href = '../home html/home2.html';";
echo "}";
echo "</script>";
?>