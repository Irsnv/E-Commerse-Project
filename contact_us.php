<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./styles/index.css">
    
    <style>
        /* General container styling */
        .container-contact-us {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 50px 20px;
            position: relative;
            background: #f8f9fa;
        }

        .container-contact-us .big-circle {
            position: absolute;
            top: 430px; /* Lowered more */
            left: 1400px; /* Moved further to the right */
            width: 200px;
            height: 200px;
            background: rgba(213, 80, 45, 0.7);
            border-radius: 50%;
        }
        .container-contact-us .big-circle-2 {
            position: absolute;
            top: 70px; /* Lowered more */
            left: 80px; /* Moved further to the right */
            width: 200px;
            height: 200px;
            background: rgba(213, 80, 45, 0.7);
            border-radius: 50%;
        }



        .circle {
            position: absolute;
            background: rgba(213, 80, 45, 0.7);
            border-radius: 50%;
        }

        .one {
            width: 60px;
            height: 60px;
            top: 50px;
            right: 50px;
        }

        .two {
            width: 40px;
            height: 40px;
            bottom: 80px;
            left: 30px;
        }

        /* Contact form container */
        .form {
            background: #ffffff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            display: flex;
            flex-wrap: wrap;
            width: 80%;
            max-width: 900px;
        }

        .contact-info, .contact-form {
            flex: 1;
            padding: 20px;
            min-width: 300px;
        }

        .contact-info .title,
        .contact-form .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #343a40;
        }

        /* Contact details */
        .contact-info .text {
            font-size: 16px;
            color: #6c757d;
        }

        .info {
            margin-top: 20px;
        }

        .information {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .information img {
            width: 30px;
            margin-right: 10px;
        }

        /* Social Media */
        .social-media {
            margin-top: 20px;
        }

        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: #db6334;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .social-icons a:hover {
            background: #8f2621;
        }

        /* Form styling */
        .contact-form form {
            display: flex;
            flex-direction: column;
        }

        .input-container {
            position: relative;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .input-container label {
            position: static;  /* Remove absolute positioning */
            font-size: 16px;
            color: #6c757d;
            margin-bottom: 5px; /* Add space between label and input */
        }

        .input-container input,
        .input-container textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
        }


        /* Submit button */
        .btn {
            background: #db6334;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background: #8f2621;
            color: #ffffff;
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
                <div class="nav-buttons">
                    <form class="form-inline">
                        <a class="btn btn-outline-light" href="login_page.php">Admin</a>
                    </form>
                </div>
            </div>
        </nav>

        <div class="container-contact-us">
            <span class="big-circle"></span>
            <div class="form">
                <div class="contact-info">
                <h3 class="title">Let's get in touch</h3>
                <p class="text">
                    Haruka Yume Store, where passion meets craftsmanship. We specialize in 
                    curating unique and elegant pieces across three distinct categories: Furniture, 
                    Fine Art, and Sculpture. Our mission is to make high-quality art accessible to everyone, 
                    whether for home decoration, collectors, or enthusiasts.
                </p>

                <div class="info">
                    <div class="information">
                    <img src="./images/location.png" class="icon" alt="" />
                    <p>Sungai Buloh 47000, Selangor</p>
                    </div>
                    <div class="information">
                    <img src="./images/email.png" class="icon" alt="" />
                    <p>harukananase@gmail.com</p>
                    </div>
                    <div class="information">
                    <img src="./images/phone-call.png" class="icon" alt="" />
                    <p>(018)-3779684</p>
                    </div>
                </div>

                <div class="social-media">
                    <p>Connect with us :</p>
                    <div class="social-icons">
                    <a href="https://www.facebook.com">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://x.com/irsnzzz">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/m.irsnv/">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com/">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    </div>
                </div>
                </div>

                <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form action="index.html" autocomplete="off">
                    <h3 class="title">Contact us</h3>
                    <div class="input-container">
                        <label for="name">Username</label>
                        <input type="text" name="name" class="input" />
                    </div>
                    <div class="input-container">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="input" />
                    </div>
                    <div class="input-container">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" class="input" />
                    </div>
                    <div class="input-container">
                        <label for="message">Message</label>
                        <textarea name="message" class="input"></textarea>
                    </div>

                    <input type="submit" value="Send" class="btn" />
                </form>
                <span class="big-circle-2"></span>
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
