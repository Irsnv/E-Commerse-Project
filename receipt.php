<?php
    session_start();
    include 'db_connect.php';

     // get the order ID from the URL
    $order_id = $_GET['order_id'] ?? null;

    if (!$order_id) {
        echo "<script>alert('Invalid order ID!'); window.location='index.php';</script>";
        exit();
    }
    //fetch order details from the database
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $order_result = $stmt->get_result();
    $order = $order_result->fetch_assoc();

    if (!$order) {
        echo "<script>alert('Order not found!'); window.location='index.php';</script>";
        exit();
    }
    //fetch order items along with product names
    $stmt = $conn->prepare("SELECT oi.*, p.product_name FROM order_items oi 
                            JOIN product p ON oi.product_id = p.product_id WHERE oi.order_id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $order_items_result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="receipt.css">

</head>
<body>
    <div class="container mt-5">
        <h2>Order Receipt</h2>
        <p><strong>Order ID:</strong> <?php echo $order['order_id']; ?></p>
        <p><strong>Name:</strong> <?php echo $order['order_fullname']; ?></p>
        <p><strong>Email:</strong> <?php echo $order['order_email']; ?></p>
        <p><strong>Address:</strong> <?php echo $order['order_address']; ?></p>
        <p><strong>Phone:</strong> <?php echo $order['order_phone_number']; ?></p>
        <p><strong>Total Amount:</strong> RM <?php echo $order['order_total_amount']; ?></p>

        <h4>Items Purchased:</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $order_items_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $item['product_name']; ?></td>
                        <td><?php echo $item['order_item_quantity']; ?></td>
                        <td>RM <?php echo $item['order_item_subtotal_price']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-primary">Return to Home</a>
    </div>
</body>
</html>
