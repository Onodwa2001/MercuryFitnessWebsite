<?php 

    session_start();

    include('logout/logoutPHPCode.php');

    include('connect.php');
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        $email = $_SESSION['email'];

        $getUser = "SELECT first_name, last_name, image FROM users WHERE email = '$email'";

        $query = mysqli_query($conn, $getUser);

        $user = mysqli_fetch_all($query, MYSQLI_ASSOC)[0];

        $firstname = $user['first_name'];
        $surname = $user['last_name'];
        $img = $user['image'];

        $name = $firstname . ' ' . $surname;


        if (isset($_POST['comment'])) {
            
            $message = mysqli_real_escape_string($conn, $_POST['message']);

            $time = date('Y-m-d H:i:s');
    
            $insert = "INSERT INTO comments VALUES('$name', '$email', '$message', '$time', '$img')";
    
            if (mysqli_query($conn, $insert)) {
                // successful
                header('Location: comments.php');
    
            } else {
                echo 'query error ' . mysqli_error($conn);
            }
        }

    }

    include('connect.php');

    $getAllComments = "SELECT * FROM comments";

    $query1 = mysqli_query($conn, $getAllComments);

    $allComments = mysqli_fetch_all($query1, MYSQLI_ASSOC);

?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mercury Fitness:</title>
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
    <!-- 2020 template -->

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">

    <script defer src="api.js"></script>

    <style>

        .comments-wrapper {
            width: 100%;
            display: grid;
            grid-template-columns: 33.33% 33.33% 33.33%;
        }

        .comment {
            height: fit-content;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 10px;
            background-color: rgb(242, 238, 227);
        }

        .comment p {
            margin-top: 20px;
            font-size: 14px;
            line-height: 20px;
        }

        .comment img {
            border-radius: 50%;
            margin-top: 20px;
            border: solid white 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .image {
            width: fit-content;
            margin: 0 auto 10px auto;
    
        }

        .info {
            background-color: white;
            padding: 20px;
            
        }

        b {
            font-size: 13px;
        }

        .see-all {
            text-align: center;
            width: 100%;
            margin: 60px;
        }

        .see-all a {
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        [id="start"] {
            font-size: 22px;
        }

        @media screen and (max-width: 767px) {
            
            .comments-wrapper {
                display: grid;
                grid-template-columns: 50% 50%;
            }

        }

        @media screen and (max-width: 416px) {
            
            .comments-wrapper {
                display: block;
            }

        }

    </style>
</head>
<a href="Single.html">

    <body style="background-color: rgb(255 211 211 / 80%);">

        <!-- Navbar Start -->
        <div class="container-fluid p-0 nav-bar">
            <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 display-4 font-weight-bold text-uppercase text-white" style="display: flex">
                        <img src="images/MercuryFitness.png" alt="Mercury Fitness Logo"
                            style="width:200px;height:150px;">
                        
                        <?php if (isset($_SESSION['loggedin'])) { ?>
                            <p style="margin-top: 40px; margin-left: 20px;"><b>Hi, <?php echo $_SESSION['fname']; ?></b></p>
                        <?php } ?>
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
                <h4 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase font-weight-bold">WELCOME TO MERCURY FITNESS</h4>
                <a id="start" href="exercise.php">START EXERCISING</a>
                <div class="d-inline-flex">
                    <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Blog Detail Start -->
        <div class="container border-top border-dark pt-5"></div>
        <div class="container py-5">
            <div class="row">
                <div class="col-12">

                    <div class="d-flex align-items-center mb-4">
                        <div class="d-flex flex-column align-items-center justify-content-center rounded-circle bg-primary text-white"
                            style="width: 100px; height: 100px;">
                            <span><script>document.write(new Date().getDate());</script></span>
                            <strong class="text-uppercase m-0 text-white">
                            <script>
                                const nameOfMonth = new Date().toLocaleString(
                                    'default', {month: 'long'}
                                );

                                document.write(nameOfMonth.slice(0, 3));
                            </script>
                            </strong>
                            
                            <span><Script>document.write(new Date().getFullYear());</Script></span>
                        </div>

                        <div class="pl-3">
                            <h1 class="font-weight-bold mb-3">MERCURY FITNESS:</h1>
                            <div class="d-flex">

                                <?php if (isset($_SESSION['loggedin'])) { ?>
                                    <a href="profile.php" style="text-decoration: none;"><span class="mr-2 text-muted"><i class="fa fa-user"></i> <?php echo $_SESSION['fname']; ?></span></a>
                                <?php } else { ?>
                                    <span class="mr-2 text-muted"><i class="fa fa-user"></i> Guest</span>
                                <?php } ?>

                                <span class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</span>
                                <a href="comments.php" style="text-decoration: none;"><span class="mr-2 text-muted"><i class="fa fa-comments"></i> <?php echo count($allComments); ?> Comments</span></a>
                            </div>
                        </div>
                    </div>

                    

                    <img class="img-fluid mb-4" src="images/carousel-1.jpg" alt="Image">

                    <h2>Choose the gym or home:</h2>
	<p>It’s a brand-new world so we have a range of brand-new ways to stay active. Whether you want to access the club near you at any time or prefer staying at home and training online or if you want a mix of both, we’ve got you covered</p>
    <h2>Why join a Mercury Fitness?</h2>
	<p>Get expert fitness advice and support to live an active lifestyle. Reach your fitness goals with our Personal Trainers, class instructors, Chiropractors, Physiotherapists, Biokineticists at our gyms. We have a membership to suit everyone. Enjoy world-class exercise equipment and facilities at our gyms conveniently located near you in Johannesburg, Pretoria, Cape Town, Durban, Bloemfontein, and throughout the rest of South Africa. We also have you covered at home with our expert online training at your fingertips.</p>
    </div>
	
    <div class="col-12 pt-4">
    <div class="media bg-secondary text-white mb-4 p-5">
        <img src="images/gym-ball.png" alt="Image" class="mr-3 mt-1 rounded-circle p-3 bg-dark" style="width:150px;">
    <div class="media-body">
        <h4 class="text-primary mb-3">Shannlyn Courtney Thomas</h4>
		<p class="m-0">Our website is for people who want to become fit, who want to maintain their fitness,
who want to lose weight or who want to gain healthy weight. We are making a
website that will have the workouts they are looking for as well as corresponding
dietary plans that will go hand in hand with their desired goals. Our Mercury Fitness
Website falls under the category health and fitness. Unlike other apps that require
you to download multiple different apps to benefit from different kinds of workouts,
our website already has multiple workouts and it doesn’t have to be downloaded
onto their phones so space will never be an issue.</p>
    </div>
    </div>
    </div>


                

                <!-- Latest Comments -->
                <h2 style="margin-top: 60px;">Latest Comments</h2>

                <div class="comments-wrapper">
                    <?php
                
                        $getComment = "SELECT * FROM comments ORDER BY created_at DESC LIMIT 3";

                        $query = mysqli_query($conn, $getComment);
                    
                        $comments = mysqli_fetch_all($query, MYSQLI_ASSOC);

                        foreach($comments as $comment) {
                
                            echo '
                            
                                <div class="comment">

                                    <div class="image">
                                        <img src="images/profile-images/'. $comment['image'] .'" height="80px" width="80px" alt="image">
                                    </div>

                                    <div class="info">
                                        <h4>' . $comment['name'] . '</h4>
                                        <h6>' . $comment['email'] . '</h6>
                                        <p><b>"</b>' . $comment['message'] . '<b>"</b></p>
                                    </div>
                    
                                </div>
                            
                            ';
                    
                        }
                    
                    ?>
                </div>

                <div class="see-all">
                    <a href="comments.php">See all comments</a>
                </div>
                

                <!-- Contact Start -->
                <div class="container border-top border-dark pt-5"></div>

                
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) { ?>

                    <div class="col-12">
                        <h3 class="mb-4 font-weight-bold">Leave a comment</h3>
                        <form action="Single.php" method="POST">

                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="comment" value="Leave Comment" class="btn btn-outline-primary px-3">
                            </div>
                        </form>
                    </div>

                <?php } ?>


            </div>
        </div>
        <!-- Contact End -->
        <!-- Blog Detail End -->


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