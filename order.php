<?php
session_start();
include 'db_connect.php'; // Include database connection

// Retrieve product_id from the URL
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;

// Fetch product details from the database
$product = null;
if ($product_id) {
    $sql = "SELECT * FROM product WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
}

// Handle payment submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simulate payment processing
    $name = $_POST['name'];
    $card_number = $_POST['card_number'];
    
    // Here you would typically process the payment
    echo "<script>alert('Payment successful for " . $product['product_name'] . "!');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/order.css">
</head>
<body>
    <div class="container">
        <h1>Order Details</h1>
        <?php if ($product): ?>
            <h2><?php echo $product['product_name']; ?></h2>
            <p><?php echo $product['product_description']; ?></p>
            <p>Price: RM <?php echo $product['product_price']; ?></p>

            <form method="post" action="">
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="card_number">Card Number:</label>
                    <input type="text" id="card_number" name="card_number" required>
                </div>
                
                <div class="btn-submit">
                    <input type="submit" value="Place Order">
                </div>
                
                <div class="btn-back">
                    <a href="index.php">Back</a>
                </div>

            </form>
        <?php else: ?>
            <p>Product not found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
