<?php
    session_start();
    include 'db_connect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //recheeck inputs
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $card_front = $_POST['card_front'];
        $card_back = $_POST['card_back'];

        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "<script>alert('Your cart is empty!'); window.location='cart.php';</script>";
            exit();
        }

        $total_price = 0;
        // loop through the cart to calculate the total price
        foreach ($_SESSION['cart'] as $item) {
            $product_id = $item['id'];
            $quantity = $item['quantity'];
            // fetch product details from the database
            $query = $conn->query("SELECT * FROM product WHERE product_id = $product_id");
            $product = $query->fetch_assoc();
            
            if ($product) {
                $subtotal = $product['product_price'] * $quantity;
                $total_price += $subtotal;
            } else {
                error_log("Product not found for ID: $product_id");
                echo "<script>alert('Product not found!'); window.location='cart.php';</script>";
                exit();
            }
        }
        // insert order details into the orders table
        $stmt = $conn->prepare("INSERT INTO orders (order_fullname, order_email, order_address, order_phone_number, order_card_front, order_card_back, order_total_amount) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssd", $fullname, $email, $address, $phone, $card_front, $card_back, $total_price);
        $stmt->execute();
        $order_id = $stmt->insert_id;
        $stmt->close();
        // loop through cart items and insert each item into order_items table
        foreach ($_SESSION['cart'] as $item) {
            $product_id = $item['id'];
            $quantity = $item['quantity'];
            // fetch product details again to check stock availability
            $query = $conn->query("SELECT * FROM product WHERE product_id = $product_id");
            $product = $query->fetch_assoc();
            if ($product) {
                if ($product['product_stock'] < $quantity) {
                    echo "<script>alert('Insufficient stock for {$product['product_name']}!'); window.location='cart.php';</script>";
                    exit();
                }

                $subtotal = $product['product_price'] * $quantity;
                // insert order item details into order_items table
                $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, order_item_quantity, order_item_subtotal_price) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("iiid", $order_id, $product_id, $quantity, $subtotal);
                $stmt->execute();
                $stmt->close();
                // deduct purchased quantity from product stock
                $new_stock = $product['product_stock'] - $quantity;
                $conn->query("UPDATE product SET product_stock = $new_stock WHERE product_id = $product_id");
            }
        }
        //to clear the cart after successful order placement
        unset($_SESSION['cart']);

        echo "<script>alert('Order Placed Successfully!'); window.location='receipt.php?order_id=$order_id';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/checkout.css"> <!-- Include new CSS -->
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-shopping-cart"></i> Checkout</h2>
        <form method="post">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="fullname" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Card Number (16 digits)</label>
                <input type="text" name="card_front" class="form-control" pattern="\d{16}" required>
            </div>
            <div class="form-group">
                <label>Card Security Code (3 digits)</label>
                <input type="text" name="card_back" class="form-control" pattern="\d{3}" required>
            </div>
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
</body>
</html>
