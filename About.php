<?php 

    session_start();

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

    	<!--Start of Slideshow -->
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/4 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.2s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 0.5s;
}

@keyframes fade {
  from {opacity: .1} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>

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
<a href="About.html">

    <body style="background-color: rgb(255 211 211 / 80%);">

        <!-- Navbar Start -->
        <div class="container-fluid p-0 nav-bar">
            <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 display-4 font-weight-bold text-uppercase text-white" style="display: flex">
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
                <h4 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase font-weight-bold">ABOUT</h4>
                <div class="d-inline-flex">
                    <p class="m-0 text-white"><a class="text-white" href="">MERCURY FITNESS</a></p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- About Start -->
<div class="container border-top border-dark pt-5"></div>
    <div class="container py-5">
    <div class="row align-items-center">
    <div class="col-lg-6">

<!--Start of Slideshow -->
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="images/img1.jpg" style="width:100%">
  <div class="text">1</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="images/img3.jpg" style="width:100%">
  <div class="text">2</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="images/img4.jpg" style="width:100%">
  <div class="text">3</div>
</div>
</div>

<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<!--End of Slideshow -->

    </div>
    
	<div class="col-lg-6">
		<h2 class="display-4 font-weight-bold mb-4">ABOUT US:</h2>
    <!-- "Start" - About us section for Mercury Fitness -->
			<p>The objective of our project is to design and develop a fitness and health website,
within a year, that will allow users to access different exercises and recommended
foods to eat that focuses on one of the three workout categories, including “Losing
weight”, “Bulking up”, and “Toning”, in order to achieve their desired goal and live an
overall healthier lifestyle. Users will be able to do this all from the comfort of their
own homes.</p>
	<!-- "End" - About us section for Mercury Fitness -->		
    <div class="row py-2">
    <div class="col-sm-6">
        <i class="flaticon-barbell display-2 text-primary"></i>
        <h4 class="font-weight-bold">ONLINE FITNESS PLATFORM</h4>
            <p>A fitness website is a site that is designed to provide fitness enthusiasts with advice, inspiration, workouts, or nutritional guidance.</p>
    </div>
    </div>
        <a href="#" class="btn btn-lg px-4 btn-outline-primary">Learn More</a>
    </div>
    </div>
    </div>
    <!-- About End -->

    <!-- Features Start -->
    <div class="container-fluid my-5">
	<div class="container border-top border-dark pt-5"></div>
        <div class="row">
        <div class="col-lg-4 p-0">
        <div class="d-flex align-items-center bg-secondary text-white px-5" style="min-height: 300px;">
                    <i class="flaticon-training display-3 text-primary mr-3"></i>
        <div class="">
                        <h2 class="text-white mb-3">Progression:</h2>
                        <p>An exercise progression is simply a way to make an exercise more challenging. Exercise progressions are extremely important in an exercise routine to continue providing stimulus to your muscles. 
						<br>
						<br>Progressing to more challenging exercises will help you continue to see changes in your body and fitness level.
                        </p>
        </div>
        </div>
        </div>
            
		<div class="col-lg-4 p-0">
        <div class="d-flex align-items-center bg-primary text-white px-5" style="min-height: 300px;">
                    <i class="flaticon-weightlifting display-3 text-secondary mr-3"></i>
        <div class="">
                        <h2 class="text-white mb-3">Workout:</h2>
                        <p>Exercise is a body activity that enhances or maintains physical fitness and overall health and wellness. 
						<br>
						<br>It is performed for various reasons, to aid growth and improve strength, develop muscles and the cardiovascular system, hone athletic skills, weight loss or maintenance, improve health, or simply for enjoyment. 
						<br>
						<br>Many individuals choose to exercise outdoors where they can congregate in groups, socialize, and improve well-being as well as mental health.
						</p>
        </div>
        </div>
        </div>
        <div class="col-lg-4 p-0">
        <div class="d-flex align-items-center bg-secondary text-white px-5" style="min-height: 300px;">
                    <i class="flaticon-treadmill display-3 text-primary mr-3"></i>
        <div class="">
                        <h2 class="text-white mb-3">Nutrition:</h2>
                        <p>Without enough carbohydrates, proteins, and fats, athletes may feel sluggish and fatigued during a workout or ravenously hungry. 
						<br>
						<br>Athletes may also need to focus on specific vitamins and minerals for fitness performance, such as iron, vitamin D, and zinc. 
						Nutrition for physical activity is highly individualized.</p>
        </div>
        </div>
        </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Team Start -->
	<div class="container border-top border-dark pt-5"></div>
    <div class="container pt-5 team">
        <div class="d-flex flex-column text-center mb-5">
            <h4 class="text-primary font-weight-bold">Our Trainers</h4>
            <h4 class="display-4 font-weight-bold">Meet Our Expert Trainers</h4>
        </div>
		
        <div class="row">
        <div class="col-lg-3 col-md-6 mb-5">
        <div class="card border-0 bg-secondary text-center text-white">
                    <div class="card-body bg-secondary">
                        <h4 class="card-title text-primary">TAMRYN-LISA LEWIN</h4>
                        <p class="card-text">CROSSFIT TRAINER</p>
                    </div>
        </div>
        </div>
		
		<div class="col-lg-3 col-md-6 mb-5">
        <div class="card border-0 bg-secondary text-center text-white">
                    <div class="card-body bg-secondary">
                        <h4 class="card-title text-primary">SINOTHANDO MASIKI</h4>
                        <p class="card-text">CARDIO TRAINER</p>
                    </div>
        </div>
        </div>
		
		<div class="col-lg-3 col-md-6 mb-5">
        <div class="card border-0 bg-secondary text-center text-white">
                    <div class="card-body bg-secondary">
                        <h4 class="card-title text-primary">PETLO MATABANE</h4>
                        <p class="card-text">RESISTANCE TRAINER</p>
                    </div>
        </div>
        </div>
		
		<div class="col-lg-3 col-md-6 mb-5">
        <div class="card border-0 bg-secondary text-center text-white">
                    <div class="card-body bg-secondary">
                        <h4 class="card-title text-primary">SHANLYNN THOMAS</h4>
                        <p class="card-text">CROSSFIT TRAINER</p>
                    </div>
        </div>
        </div>        
    </div>
    </div>
    <!-- Team End -->

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