<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exhibitions</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./styles/index.css">
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

        <div class="content-exhibitions">
            <div class="container mt-4">
                <div class="card mb-3" style="max-width: 800px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="exhibition-image.jpg" class="img-fluid rounded-start" alt="Exhibition Image" style="aspect-ratio: 4/3; object-fit: cover;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Manet/Degas</h5>
                                <p class="card-text"><strong>Location:</strong> The Metropolitan Museum of Art, New York</p>
                                <p class="card-text"><strong>Dates:</strong> September 24, 2023 – January 7, 2024</p>
                                <p class="card-text"><strong>Description:</strong> A deep dive into the relationship and rivalry between 19th-century French artists Édouard Manet and Edgar Degas.</p>
                                <a href="https://www.metmuseum.org" class="btn btn-primary" target="_blank">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
