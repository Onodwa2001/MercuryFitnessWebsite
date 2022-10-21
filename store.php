<?php 

    session_start();

    include('connect.php');

    $sql = "SELECT * FROM products";

    $products = mysqli_query($conn, $sql);

    $result = mysqli_fetch_all($products, MYSQLI_ASSOC);

    mysqli_free_result($products);

    mysqli_close($conn);

    include('logout/logoutPHPCode.php');

    // $_SESSION['cart'] = [];


    if (isset($_POST['add'])) {
        // $_SESSION['id_session'] = $_GET['id'];

        $product_id = $_GET['id'];
        $product_name = $_POST['prod_name'];
        $product_price = $_POST['price'];
        $product_quantity = $_POST['qty'];

        $values = array( "id" => $product_id, "name" => $product_name, "price" => $product_price, "qty" => $product_quantity );

        $_SESSION['message'] = '';

        if (isset($_SESSION['cart'])) {
            // $_SESSION['cart'] = $values;
            $items_array_id = array_column($_SESSION['cart'], 'id');

            if (!in_array($_GET['id'], $items_array_id)) {
                array_push($_SESSION['cart'], $values);
                echo '<style>
                    .error {
                        background-color: rgb(10, 200, 13, 0.4);
                        width: fit-content;
                        padding: 10px;
                        color: white;
                        border-left: solid 5px green;
                        display: block !important;
                    }
                </style>';

                $_SESSION['message'] = 'Item successfully added to cart';
            } else {
                echo '<style>
                    .error {
                        background-color: rgb(200, 10, 13, 0.4);
                        width: fit-content;
                        padding: 10px;
                        color: white;
                        border-left: solid 5px red;
                        display: block !important;
                    }
                </style>';

                $_SESSION['message'] = 'The item you tried to add has already been added to the cart';
            }
            
        } else {
            $_SESSION['cart'][0] = $values;
        }
    }

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
    <!-- <script defer src="js/store.js"></script> -->

    <style>

        [id="rm"] {
            background-color: black !important;
            margin-bottom: 20px;
        }

        [id="rm"]:hover {
            color: white !important;
        }

        .store .product {
            border: none;
        }

        .store .product:hover {
            transform: scale(1.03, 1.03);
            transition: .3s;
            box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2);
        }



        .id {
            background-color: #e33832 !important;
            color: white !important;
            border: none !important;
            padding-left: 10px !important;
            padding-right: 10px !important;
            border-radius: 50px;
        }
        
        @media screen and (max-width: 866px) {
            
            .store {
                display: grid;
                grid-template-columns: 50% 50%;
            }

        }

        @media screen and (max-width: 416px) {
            
            .store {
                display: block;
            }

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


        <div class="container border-top border-dark pt-5"></div>

        <div class="success-message" id="success-message">
            <img src="images/success.png" alt="">
            <p>Successfully added to cart</p>
        </div>

        <div class="error" style="margin-left: 150px; margin-bottom: 40px; display: none;" ><?php echo $_SESSION['message']; ?></div>

        <div class="store-wrapper">
            <div class="store">

                <?php foreach($result as $product) { ?>
                    <div class="product" style="background-color: white;">
                        <img src="images/store-items/<?php echo $product['image']; ?>" width="100%" height="280px" alt="">
                        <div class="item-description">
                            <br/>
                            <p class="content"><strong><?php echo $product['product_name']; ?></strong></p>
                            <p class="content">ZAR <?php echo $product['price']; ?></p>
                            <p class="content">Items in stock: <?php echo $product['items_in_stock'] ?></p>

                            <form action="store.php?action=add&id=<?php echo $product['id']; ?>" method="POST">

                            <?php 
                            
                        
                        ?>


                                <input type="hidden" name="prod_name" value="<?php echo $product['product_name']; ?>">
                                <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                                <label for="price">Quantity:</label>
                                <input type="number" name="qty" value="1" min="1" max="<?php echo $product['items_in_stock'] ?>"><br><br>
                                <button class="id" name="add" id="<?php // echo $product['id']; ?>" style="border: solid black 1px; color: black;">add to cart</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>

                <!-- connect to the database -->
                <?php $create_cart_table = ""; ?>

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

        <script>




        </script>

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
        <script src="js/store.js"></script>
    </body>

</html>