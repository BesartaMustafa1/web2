<?php
session_start();

// Initialize cart from session or cookie
if (!isset($_SESSION['cart']) && isset($_COOKIE['cart'])) {
    $_SESSION['cart'] = json_decode($_COOKIE['cart'], true);
} elseif (!isset($_SESSION['cart'])) {
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

    // Save cart to cookie
    setcookie('cart', json_encode($_SESSION['cart']), time() + (86400 * 30), "/"); // 30 days

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

    // Save updated cart to cookie
    setcookie('cart', json_encode($_SESSION['cart']), time() + (86400 * 30), "/"); // 30 days

    // Redirect to the same page to reflect the changes
    header('Location: shop.php');
    exit;
}

// Calculate total price
$total_price = array_sum(array_column($_SESSION['cart'], 'price'));

// Sort cart items by name or price
if (isset($_GET['sort_by'])) {
    if ($_GET['sort_by'] == 'name') {
        usort($_SESSION['cart'], function($a, $b) {
            return strcmp($a['name'], $b['name']);
        });
    } elseif ($_GET['sort_by'] == 'price') {
        usort($_SESSION['cart'], function($a, $b) {
            return $a['price'] <=> $b['price'];
        });
    }
}

// Confirm order
if (isset($_POST['confirm_order'])) {
    $_SESSION['cart'] = [];
    header('Location: ../home html/home2.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../header/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
</head>
<style>
  
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table thead {
    background-color: #f2f2f2;
}

.table th {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table tbody tr {
    border-bottom: 1px solid #ddd;
}

.table td {
    padding: 10px 15px;
}

.table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.table th {
    background-color: #f2f2f2;
}


.btn-secondary {
    background-color: #6c757d;
    color: white;
}


form {
    margin-top: 20px;
    display: flex;
    justify-content: flex-end;
}

.btn {
    display: inline-block;
    padding: 8px 16px;
    margin: 4px 10px 4px 2px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

a {
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}

</style>
<body>
<div id="header">
    <?php include '../header/header.php'; ?>
</div>

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
    
    <form action="../home html/home2.php" method="post">
        <input type="submit" name="confirm_order" value="Confirm" class="btn btn-primary">
    </form>
    <a href="shop.php?sort_by=name">Sort by Name</a> | 
<a href="shop.php?sort_by=price">Sort by Price</a>

<br>
<?php 
include "../cookies\cookiefolder/cookies/Cookies.php";
 ?>
</body>
</html>
