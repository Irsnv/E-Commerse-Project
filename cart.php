<?php
    session_start();
    include 'db_connect.php'; // Database connection

    // initialize cart if not set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // add product to cart
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // check if product is already in the cart
        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $product_id) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }

        if (!$found) { //if product is not the cart
            // fetch product details from database
            $stmt = $conn->prepare("SELECT * FROM product WHERE product_id = ?");
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $product = $result->fetch_assoc();

            if ($product) {
                $_SESSION['cart'][] = [
                    'id' => $product['product_id'],
                    'name' => $product['product_name'],
                    'price' => $product['product_price'],
                    'quantity' => $quantity,
                    'image' => $product['product_image']
                ];
            }
        }
        $_SESSION['message'] = "Product added successfully!";
        header("Location: cart.php");
        exit();
    }

    // Update quantity
    if (isset($_POST['update_cart'])) {
        foreach ($_POST['quantity'] as $product_id => $qty) {
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == $product_id) { //to find matching product
                    $item['quantity'] = max(1, intval($qty)); // Ensure at least 1
                    break;
                }
            }
        }
        header("Location: cart.php");
        exit();
    }

    // Remove item from cart
    if (isset($_POST['remove_item'])) {
        $product_id = $_POST['remove_item']; // get product ID to remove
        $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) use ($product_id) {
            return $item['id'] != $product_id;
        });
        header("Location: cart.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="./styles/cart.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center"><i class="fas fa-shopping-cart"></i> Your Cart</h2>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']); 
                ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $index => $item) {
                        $itemTotal = $item['price'] * $item['quantity'];
                        $total += $itemTotal;
                        echo "<tr>
                            <td>{$item['name']}</td>
                            <td><img src='./images/" . $item["image"] . "' alt='" . $item["name"] . "' class='cart-img'></td>
                            <td>RM {$item['price']}</td>
                            <td>
                                <input type='number' name='quantity[{$item['id']}]' value='{$item['quantity']}' min='1' class='form-control' style='width: 70px;'>
                            </td>
                            <td>RM {$itemTotal}</td>
                            <td>
                                <button type='submit' name='remove_item' value='{$item['id']}' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> Remove</button>
                            </td>
                        </tr>";
                    }
                    
                    ?>
                </tbody>
            </table>
            <h4 class="text-right">Total: <strong>RM <?php echo $total; ?></strong></h4>

            <div class="text-center mt-3">
                <a href="index.php" class="btn btn-primary"><i class="fas fa-shopping-bag"></i> Continue Shopping</a>
                <button type="submit" name="update_cart" class="btn btn-warning"><i class="fas fa-sync-alt"></i> Update Cart</button>
                <?php if (!empty($_SESSION['cart'])): ?>
                    <a href="checkout.php" class="btn btn-success"><i class="fas fa-credit-card"></i> Proceed to Checkout</a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</body>
</html>
