<?php 
    session_start();
    if (!isset($_SESSION['role'])) {
        header("Location: login_page.php");
        exit();
    }

    include 'db_connect.php';

    // Query to get customer purchase history
    $query = "
        SELECT 
            o.order_id AS customer_id, 
            o.order_fullname AS name, 
            o.order_email AS email, 
            IFNULL(GROUP_CONCAT(p.product_name SEPARATOR ', '), 'No purchases') AS purchase_history
        FROM orders o
        LEFT JOIN order_items oi ON o.order_id = oi.order_id
        LEFT JOIN product p ON oi.product_id = p.product_id
        GROUP BY o.order_id, o.order_fullname, o.order_email;
    ";

    $result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Purchase History</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/admin.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center my-4">Customer Purchase History</h2>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Purchase History</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['customer_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['purchase_history']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="admin.php" class="btn btn-secondary">Back to Admin Panel</a>
    </div>
</body>
</html>
