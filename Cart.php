<?php 

    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'delete') {
            foreach($_SESSION['cart'] as $keys => $values) {
                if ($values['id'] == $_GET['id']) {
                    unset($_SESSION['cart'][$keys]);
                    // echo "<script>alert('Item Removed')</script>";
                    // echo "<script>window.location='Cart.php';</script>";
                }
            }
        }
    }

    if (isset($_POST['checkout'])) {
        // header('Location: order.php');
        echo '<script>location.href = "order.php"</script>';
    }

    include('logout/logoutPHPCode.php');

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mercury Fitness: About Us</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- 2020 template -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/store-style.css">
    <!-- 2020 template -->

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">

    <!-- JavaScript files -->
    <script defer src="js/cart.js"></script>

    <style>
        .row .pt-5 {
            margin-top: 600px;
        }
    </style>
</head>
<a href="About.html">

    <body style="background-color: rgb(255 211 211 / 80%);">

        <!-- Navbar Start -->
        <div class="container-fluid p-0 nav-bar">
            <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 display-4 font-weight-bold text-uppercase text-white">
                        <img src="images/MercuryFitness.png" alt="Mercury Fitness Logo"
                            style="width:200px;height:150px;">
                    </h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto p-4 bg-secondary">
                        <a href="Single.php" class="nav-item nav-link">Home</a>
                        <a href="About.php" class="nav-item nav-link">About Us</a>
                        <a href="profile.php" class="nav-item nav-link">Profile</a>
                        <a href="Contact.php" class="nav-item nav-link">Contact</a>
                        <a href="store.php" class="nav-item nav-link">Shop</a>
                        <a href="Cart.php" class="nav-item nav-link">Cart</a>

                        <?php if (!isset($_SESSION['loggedin'])) { ?>

                            <a href="login.php" class="nav-item nav-link" style="background-color: grey;">Log in</a>

                        <?php } else { ?>

                            <?php include('logout/logout.php'); ?>

                        <?php } ?>
                        <a href="register.php" class="nav-item nav-link" style="background-color: red;">Sign Up</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5"
                style="min-height: 400px">
                <br>
                <br>
                <br>
                <br>
                <h4 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase font-weight-bold">SHOP FOR SOME
                    EXERCISE EQUIPMENT</h4>
                <div class="d-inline-flex">
                    <p class="m-0 text-white"><a class="text-white" href="">MERCURY FITNESS</a></p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <style>
            .cart .cart-item {
                display: grid;
                grid-template-columns: 30% 30% 30% 10%;
            }

            .cart .cart-item button {
                width: 50%;
            }

            .cart .headings {
                display: grid;
                grid-template-columns: 30% 30% 30% 10%;
            }

            @media screen and (max-width: 866px) {
            
                .cart {
                    width: 0;
                }

            }

            @media screen and (max-width: 800px) {
            
                .cart-wrapper {
                    display: block;
                }

            }

            tr:nth-child(even) {
                background-color: grey;
            }

            #checkout_button {
                background-color: red;
                border: none;
                border-radius: 40px;
                color: white;
                padding: 10px;
            }

            .info-wrapper {
                
            }

        </style>


        <div class="container border-top border-dark pt-5"></div>
        <div class="cart-wrapper" style="margin-bottom: 140px;">
            <div class="cart">
                

            <!-- <style>
                .cart-info {
                    display: grid;
                    grid-template-columns: 50% 50%;
                    gap: 20px;
                    height: 15vh;
                }
            </style> -->

            <div class="david">
                <h3 id="results">Cart Items:</h3>
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width: 14%;">Prod id</th>
                        <th scope="col" style="width: 32%;">Name:</th>
                        <th scope="col" style="width: 28%;">Price:</th>
                        <th scope="col" style="width: 24%;">Quantity</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody id="table-data">

                        <?php
                            if (!empty($_SESSION['cart'])) {
                                $total = 0;
                                $no_of_items = 0;
                                foreach($_SESSION['cart'] as $keys => $values) {
                        ?>

                            <tr style="background-color: white;">
                            <!-- <th scope="row">${i + 1}</th> -->
                            <td><?php echo $values['id']; ?></td>
                            <td><?php echo $values['name']; ?></td>
                            <td>ZAR <?php echo $values['price']; ?></td>
                            <td><?php echo $values['qty']; ?></td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $values['id']; ?>">remove</a></td>
                            </tr>

                        <?php
                                    $total += ($values['qty'] * $values['price']);
                                    $no_of_items += ($values['qty']);

                                    $_SESSION['no_of_items'] = $no_of_items;
                                    $_SESSION['total'] = $total;
                                }
                            }
                        ?>
                    
                    </tbody>
                </table> 
                </div>
              
            </div>
			
            <div class="info-wrapper">
                <div class="cart-info">
                    <p><strong>Total number of items: </strong></p>
                    <p id="total_value"><?php echo isset($_SESSION['no_of_items']) ? $_SESSION['no_of_items'] : '0'; ?></p>
                    <p><strong>Balance: </strong></p>
                    <p id="balance_value">ZAR <?php echo isset($_SESSION['total']) ? number_format($_SESSION['total'], 2) : '0.00'; ?></p>
                    <form action="Cart.php" method="POST">
                        <button name="checkout" id="checkout_button">Checkout</button>
                    </form>
			    </div>
            </div>
			
        </div>


        <!-- Footer Start -->
        <!-- Footer Start -->
        <div class="footer container-fluid mt-5 py-5 px-sm-3 px-md-5 text-white">
            <div class="container border-top border-dark pt-5"></div>
            <div class="row pt-5">
                <div class="col-lg-6 col-md-6 mb-5">
                    <h4 class="text-primary mb-4">Get In Touch</h4>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>3000 Street, Cape Town, RSA</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope mr-2"></i>Project2Group16@gmail.com</p>

                    <div class="d-flex justify-content-start mt-4">
                        <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                            style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                            style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                            style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                            style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-5">
                    <h4 class="text-primary mb-4">Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white mb-2" href="Single.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-white mb-2" href="About.php"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                        <a class="text-white mb-2" href="Classes.html"><i class="fa fa-angle-right mr-2"></i>What's Coming</a>
                        <a class="text-white" href="Contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>

            </div>
            <br>

            <div class="container border-top border-dark pt-5">
                <p class="m-0 text-center text-white"> &copy; <a class="text-white font-weight-bold" href="#">MERCURY
                        FITNESS</a>. All Rights Reserved. Designed by Group 16.</p>
            </div>
        </div>

        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-outline-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>
