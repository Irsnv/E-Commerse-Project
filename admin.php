<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haruka Yume Store</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/admin.css">

    <?php
    // Ensure data directory exists
    if (!file_exists('data')) {
        mkdir('data', 0777, true);
    }
    ?>
</head>
<body>
    <div class="container-fluid p-0">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="logo" width="100">
                <a class="navbar-brand" href="index.php">Haruka Yume Store</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="about_us.php">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="browseDropdown" role="button" data-toggle="dropdown">
                                Browse Art
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="furniture.php">Furniture</a>
                                <a class="dropdown-item" href="fine_art.php">Fine Art</a>
                                <a class="dropdown-item" href="sculpture.php">Sculpture</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                More
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="exhibitions.php">Exhibitions</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="contact_us.php">Contact Us <i class="fa-solid fa-phone"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="nav-buttons">
                    <form class="form-inline">
                        <a class="btn btn-outline-light" href="login_page.php">Admin</a>
                    </form>
                </div>
            </div>
        </nav>

            <h2 class="text-center mb-4">Manage Products</h2>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-center">

                            <div class="card-body">
                                <h3>Add Product</h3>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="product_name">Product Name:</label>
                                        <input type="text" class="form-control" name="product_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_price">Product Price:</label>
                                        <input type="number" step="0.01" class="form-control" name="product_price" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="product_category">Category:</label>
                                        <select class="form-control" name="product_category" required>
                                            <option value="Furniture">Furniture</option>
                                            <option value="Fine Art">Fine Art</option>
                                            <option value="Sculpture">Sculpture</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_description">Description:</label>
                                        <textarea class="form-control" name="product_description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_stock">Stock Quantity:</label>
                                        <input type="number" class="form-control" name="product_stock" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_image">Upload Image:</label>
                                        <input type="file" class="form-control-file" name="product_image">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h3>Update Product</h3>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="product_id">Select Product:</label>
                                        <select class="form-control" name="product_id" required>
                                            <?php
                                            include 'db_connect.php'; // Include database connection
                                            $sql = "SELECT product_id, product_name FROM product"; // Query to get products
                                            $result = $conn->query($sql);
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='{$row['product_id']}'>{$row['product_name']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_name">New Product Name:</label>
                                        <input type="text" class="form-control" name="new_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_stock">New Stock Quantity:</label>
                                        <input type="number" class="form-control" name="new_stock">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_description">New Description:</label>
                                        <textarea class="form-control" name="new_description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_price">New Price:</label>
                                        <input type="number" step="0.01" class="form-control" name="new_price">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="update_product">Update Product</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card text-center">

                            <div class="card-body">
                                <h3>Delete Product</h3>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="delete_product_id">Select Product to Delete:</label>
                                        <select class="form-control" name="delete_product_id" required>
                                            <?php
                                            $result = $conn->query($sql);
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='{$row['product_id']}'>{$row['product_name']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-danger" name="delete_product">Delete Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                // Handle Add Product
                if (isset($_POST["add_product"])) {
                    $productName = $_POST["product_name"];
                    $productPrice = $_POST["product_price"];
                    $productCategory = $_POST["product_category"];
                    $productDescription = $_POST["product_description"];
                    $productStock = $_POST["product_stock"];
                    $productImage = $_FILES["product_image"]["name"];

                    // Move uploaded file to images directory
                    move_uploaded_file($_FILES["product_image"]["tmp_name"], "images/$productImage");
                    
                    // Insert new product into the database
                    $conn->query("INSERT INTO product (product_name, product_price, product_category, product_description, product_stock, product_image) VALUES ('$productName', '$productPrice', '$productCategory', '$productDescription', '$productStock', '$productImage')");

                    echo '<div class="alert alert-success" style="text-align:center">Product Added Successfully!</div>';
                }

                if (isset($_POST["update_product"])) {
                    $productId = $_POST["product_id"];
                    $newName = $_POST["new_name"] ?? null;
                    $newStock = $_POST["new_stock"] ?? null;
                    $newDescription = $_POST["new_description"] ?? null;
                    $newPrice = $_POST["new_price"] ?? null;
                
                    $updateQuery = "UPDATE product SET";
                    $updates = [];
                
                    if (!empty($newName)) {
                        $updates[] = " product_name = '$newName'";
                    }
                    if (!empty($newStock)) {
                        $updates[] = " product_stock = $newStock";
                    }
                    if (!empty($newDescription)) {
                        $updates[] = " product_description = '$newDescription'";
                    }
                    if (!empty($newPrice)) {
                        $updates[] = " product_price = $newPrice";
                    }
                
                    if (!empty($updates)) {
                        $updateQuery .= implode(',', $updates) . " WHERE product_id = $productId";
                        $conn->query($updateQuery);
                        echo '<div class="alert alert-success">Product Updated Successfully!</div>';
                    }
                }
                

                // Handle Delete Product
                if (isset($_POST["delete_product"])) {
                    $deleteProductId = $_POST["delete_product_id"];
                    $conn->query("DELETE FROM product WHERE product_id = $deleteProductId");
                    echo '<div class="alert alert-danger">Product Deleted Successfully!</div>';
                }
                ?>
        </div>
        <div class="footer">
            <div class="footer-column">
                <h4>HARUKA YUME STORE</h4>
                <ul>
                    <li><a href="furniture.php">Furniture</a></li>
                    <li><a href="fine_art.php">Fine Art</a></li>
                    <li><a href="sculpture.php">Sculpture</a></li>
                </ul>
            </div>        

            <div class="footer-column">
                <h4>MORE</h4>
                <ul>
                    <li><a href="exhibitions.php">Exhibitions</a></li>
                    <div class="follow-us">
                        <span>Follow us - </span>
                        <a href="https://www.facebook.com" target="_blank">
                            <img src="./images/facebook.png" alt="Facebook"> Facebook
                        </a>
                        <a href="https://x.com/irsnzzz" target="_blank">
                            <img src="./images/twitter.png" alt="Twitter"> Twitter
                        </a>
                        <a href="https://www.instagram.com/m.irsnv/" target="_blank">
                            <img src="./images/instagram.png" alt="Instagram"> Instagram
                        </a>
                        <a href="https://www.tiktok.com/@irsnv.m" target="_blank">
                            <img src="./images/tiktok.png" alt="Tiktok"> Tiktok
                        </a>
                    </div>
                </ul>
            </div>

            <div class="footer-column my-store">
                <h4>MY STORE</h4>
                <address>
                    <strong>Haruka Yume .Inc</strong><br>
                    Sungai Buloh<br>
                    47000, Selangor<br>
                    <a class="btn-link" href="https://wa.me/+60183779684">(018)-3779684</a>
                </address>
                <address>
                    <strong>HARUKA NANASE</strong><br>
                    <a href="mailto:#">harukananase@gmail.com</a>
                </address>
            </div>
        </div>


        <div class="by-Irsan">
                <p>
                    site by
                    <a href="https://github.com/Irsnv"> Irsan (reference artlistings.com) </a>
                </p>
            </div>
        
       <!-- jQuery (must be before Bootstrap JS) -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <!-- Popper.js (for Bootstrap tooltips & dropdowns) -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

    </div>
</body>
</html>
