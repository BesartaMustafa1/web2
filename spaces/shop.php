<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item to cart
if (isset($_POST['add_to_cart'])) {
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_quantity = 1; // Default quantity

    $item = [
        'id' => $item_id,
        'name' => $item_name,
        'price' => $item_price,
        'quantity' => $item_quantity
    ];

    // Check if item is already in cart
    $existing_item = array_search($item_id, array_column($_SESSION['cart'], 'id'));

    if ($existing_item !== false) {
        $_SESSION['cart'][$existing_item]['quantity'] += 1;
    } else {
        // Add item to cart array
        $_SESSION['cart'][] = $item;
    }

    // Redirect to cart page
    header('Location: shop.php');
    exit;
}

if (isset($_GET['remove_item'])) {
    $remove_id = $_GET['remove_item'];

    // Remove item from cart array
    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['id'] == $remove_id) {
            unset($_SESSION['cart'][$index]);
            break;
        }
    }

    // Reset array keys
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    // Redirect to home page
    header('Location: spaces.php');
    exit;
}

// Calculate total price
$total_price = array_sum(array_column($_SESSION['cart'], 'price'));

if (isset($_GET['sort_by']) && $_GET['sort_by'] == 'name') {
    usort($_SESSION['cart'], function($a, $b) {
        return strcmp($a['name'], $b['name']);
    });
}

// Sort cart items by price
if (isset($_GET['sort_by']) && $_GET['sort_by'] == 'price') {
    usort($_SESSION['cart'], function($a, $b) {
        return $a['price'] <=> $b['price'];
    });
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <!-- Add your CSS and JS links here -->
</head>
<body>
    <div id="header"></div>
    
    <!-- Cart Display Section -->
    <h3 class="page-title">Cart</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td>$<?php echo $item['price']; ?></td>
                    <td>
                        <a href="shop.php?remove_item=<?php echo $item['id']; ?>" class="btn btn-danger">Remove</a>
                    </td>
                    <td><?php echo $item['quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"></td>
                <td><strong>Total Price:</strong></td>
                <td>$<?php echo number_format($total_price, 2); ?></td>
            </tr>
        </tfoot>
    </table>
    
    <form action="../home html/home2.html" method="post">
        <input type="submit" name="confirm_order" value="Confirm" class="btn btn-primary">
    </form>
    <a href="shop.php?sort_by=name">Sort by Name</a> | 
<a href="shop.php?sort_by=price">Sort by Price</a>


   
</body>
</html>
