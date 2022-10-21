<?php 

    session_start();

    include('logout/logoutPHPCode.php');

    $_SESSION['workout_routine'] = '';

    if (isset($_POST['Intense_Body_Building'])) {
        $_SESSION['workout_routine'] = 'Intense Body Building';
        header('Location: exercise.php');
    } else if (isset($_POST['Relaxed_Body_Building'])) {
        $_SESSION['workout_routine'] = 'Relaxed Body Building';
        header('Location: exercise.php');
    } else if (isset($_POST['Intense_Toning'])) {
        $_SESSION['workout_routine'] = 'Intense Toning';
        header('Location: exercise.php');
    } else if (isset($_POST['Relaxed_Toning'])) {
        $_SESSION['workout_routine'] = 'Relaxed Toning';
        header('Location: exercise.php');
    } else if (isset($_POST['Intense_Losing_Weight'])) {
        $_SESSION['workout_routine'] = 'Intense Weight Loss';
        header('Location: exercise.php');
    } else if (isset($_POST['Relaxed_Losing_Weight'])) {
        $_SESSION['workout_routine'] = 'Relaxed Weight Loss';
        header('Location: exercise.php');
    }
    
    // UPDATE WORKOUT ROUTINE
    include('connect.php');

    if (isset($_SESSION['workout_routine'])) {
        $routine = $_SESSION['workout_routine'];

        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];

            $sql = "UPDATE users SET workout_routine = '$routine' WHERE email = '$email'";
                    
            if (mysqli_query($conn, $sql)) {
                // fine
            } else {
                echo 'query error ' . mysqli_error($conn);
            }
        }
    }

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
</head>
<a href="Single.html">

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
                <h4 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase font-weight-bold">CHOOSE WORKOUT
                    ROUTINE</h4>
                <div class="d-inline-flex">
                    <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Blog Detail Start -->
        <div class="container border-top border-dark pt-5"></div>


        <main class="main-workout">

            <div class="card-wrapper">
                <div class="each-card">
                    <h3>Body Building</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet voluptate, itaque, ab ut nisi
                        modi provident temporibus commodi dolorum consectetur officia ipsa quas aperiam ullam
                        cupiditate. Aperiam consequuntur quasi quae!</p>
                    
                    <form action="workout.php" method="POST">
                        <div class="btns">
                            <button name="Intense_Body_Building">Intense</button>
                            <button name="Relaxed_Body_Building">Relaxed</button>
                        </div>
                    </form>
                </div>
                <div class="each-card">
                    <h3>Toning</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet voluptate, itaque, ab ut nisi
                        modi provident temporibus commodi dolorum consectetur officia ipsa quas aperiam ullam
                        cupiditate. Aperiam consequuntur quasi quae!</p>

                    <form action="workout.php" method="POST">
                        <div class="btns">
                            <button name="Intense_Toning">Intense</button>
                            <button name="Relaxed_Toning">Relaxed</button>
                        </div>
                    </form>
                </div>
                <div class="each-card">
                    <h3>Losing weight</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet voluptate, itaque, ab ut nisi
                        modi provident temporibus commodi dolorum consectetur officia ipsa quas aperiam ullam
                        cupiditate. Aperiam consequuntur quasi quae!</p>

                    <form action="workout.php" method="POST">
                        <div class="btns">
                            <button name="Intense_Losing_Weight">Intense</button>
                            <button name="Relaxed_Losing_Weight">Relaxed</button>
                        </div>
                    </form>
                </div>
            </div>

        </main>
        
        <style>

            .btns button {
                border: none;
                color: white;
                padding: 7px;
            }

            .btns button:hover {
                opacity: .4;
                transition: .2s;
            }

            .btns button:nth-child(1) {
                background-color: black;
            }

            .btns button:nth-child(2) {
                background-color: red;
            }

        </style>


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
            const options = {
                method: 'GET',
                headers: {
                    'X-RapidAPI-Key': 'c4fb6325c5msh57abebb046fdd31p1bd7aajsne398b29cc250',
                    'X-RapidAPI-Host': 'exercisedb.p.rapidapi.com'
                }
            };

            fetch('https://exercisedb.p.rapidapi.com/exercises', options)
                .then(response => response.json())
                .then(response => {

                    response.forEach(el => {
                        if (el.bodyPart == 'chest') {
                            // Body building
                        }
                    });

                    response.forEach(el => {
                        if (el.name.includes('bench press')) {
                            // Toning
                            console.log(el);
                        }

                        
                    });

                })
                .catch(err => console.error(err));
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
    </body>

</html>