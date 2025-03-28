<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sculpture</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./styles/index.css">
    <style>
     
    #aboutCarousel {
        max-width: 1120px; 
        margin: 0 auto;
        margin-top: 50px;
    }
    
    #aboutCarousel .carousel-inner img {
        width: 1120px;
        height: 470px; 
        object-fit: cover;
        border-radius: 10px; 
    }

    </style>
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
                
                <!-- Cart Icon Button -->
                <div class="nav-buttons d-flex align-items-center">
                    <a href="cart.php" class="btn btn-warning me-2">
                        <img src="./images/add-cart.png" alt="Cart" width="24">
                    </a>
                    <a class="btn btn-outline-light" href="login_page.php">Admin</a>
                </div>
            </div>
        </nav>
    </div>

    <script>
        // add to Cart Button Click
        document.addEventListener("DOMContentLoaded", function () {
            const cart = JSON.parse(localStorage.getItem("cart")) || [];

            document.querySelectorAll(".add-to-cart").forEach(button => {
                button.addEventListener("click", function () {
                    const product = {
                        id: this.getAttribute("data-id"),
                        name: this.getAttribute("data-name"),
                        price: this.getAttribute("data-price"),
                        image: this.getAttribute("data-image"),
                        quantity: 1
                    };

                    // check if product already exists in cart
                    const existingProduct = cart.find(item => item.id === product.id);
                    if (existingProduct) {
                        existingProduct.quantity++;
                    } else {
                        cart.push(product);
                    }

                    // Save cart to localStorage
                    localStorage.setItem("cart", JSON.stringify(cart));
                    alert("Added to Cart!");
                });
            });
        });
    </script>

        <!-- Bootstrap Carousel (Slideshow) -->
        <div id="aboutCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#aboutCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#aboutCarousel" data-slide-to="1"></li>
                <li data-target="#aboutCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Slideshow Images -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/slideshow1.avif" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="./images/slideshow2.avif" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="./images/slideshow3.avif" class="d-block w-100" alt="Slide 3">
                </div>
            </div>

            <!-- Controls (Prev/Next Buttons) -->
            <a class="carousel-control-prev" href="#aboutCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#aboutCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="content-sculpture">
            <h2 style="text-align: center; margin-top: 40px; margin-bottom: 20px;">SCULPTURE COLLECTION</h2>

            <!-- Category Filter Dropdown (Only on this page) -->
            <form method="GET" action="" class="category-features" style="text-align: center; margin-bottom: 20px;">
                <label for="category">Select Category: </label>
                <select name="category" id="category" onchange="redirectToCategory(this.value)">
                    <option value="index.php">View All</option>
                    <option value="furniture.php" <?php if(basename($_SERVER['PHP_SELF']) == 'furniture.php') echo 'selected'; ?>>Furniture</option>
                    <option value="fine_art.php" <?php if(basename($_SERVER['PHP_SELF']) == 'fine_art.php') echo 'selected'; ?>>Fine Art</option>
                    <option value="sculpture.php" <?php if(basename($_SERVER['PHP_SELF']) == 'sculpture.php') echo 'selected'; ?>>Sculpture</option>
                </select>
            </form>

            <div id="product-list" class="product-list">
                <?php
                    include 'db_connect.php'; 

                    //fetch SQL query to show only sculpture products
                    $sql = "SELECT * FROM product WHERE product_category = 'Sculpture'";

                    $result = $conn->query($sql);
                    // check if products exist
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                                <div class="product-box">
                                    <img src="images/' . $row['product_image'] . '" alt="' . $row['product_name'] . '" style="width: 250px; height: 250px; object-fit: cover; border-radius: 20px;">
                                    <h5>' . $row['product_name'] . '</h5>
                                    <span class="card-text">' . $row['product_description'] . '</span><br>
                                    <span><strong>Category:</strong> ' . $row['product_category'] . '</span><br>
                                    <span><strong>Price:</strong> RM ' . $row['product_price'] . '</span><br>
                                    <span><strong>Stock:</strong> ' . ($row['product_stock'] > 0 ? $row['product_stock'] : '<span style="color:red;">Out of stock</span>') . '</span><br>';
                            // show add to cart button if the product has astock
                            if ($row['product_stock'] > 0) {
                                echo '
                                    <form method="post" action="cart.php">
                                        <input type="hidden" name="product_id" value="' . $row['product_id'] . '">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                                    </form>';
                            } else {
                                // disabled button if out of stock
                                echo '<button class="btn btn-secondary" disabled>Out of Stock</button>';
                            }

                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>

        <script>
            function redirectToCategory(category) {
                if (category) {
                    window.location.href = category; // Redirect to selected category page
                }
            }
        </script>

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
