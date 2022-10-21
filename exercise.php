<?php 

    session_start();

    // DATABASE CONNECTION

    include('connect.php');

    // add results to database
        
    // $res = json_decode($response, true);

    /**
     * 
     * FITNESS DATA API
     * 
     * Grabbing some of the data
     * and putting it in the database manually
     * 
     * Code that inserts to the database has been commented
     * Will be uncommented later if more data
     * needs to be added
     * 
     */
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://exercisedb.p.rapidapi.com/exercises",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: exercisedb.p.rapidapi.com",
            "X-RapidAPI-Key: 94d38f8fbdmshe520b9057778ceep10ca03jsn5a7ec122e11f"
        ],
    ]);

    // $response = curl_exec($curl);

    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {

        // make query to insert api data to database
        
        // foreach($res as $value) {

        //     // DAY 1

        //     if ($value['name'] == 'split squats') {

        //         $id = $value['id'];
        //         $name = $value['name'];
        //         $bodyPart = $value['bodyPart'];
        //         $equipment = $value['equipment'];
        //         $image = $value['gifUrl'];
        //         $target = $value['target'];

        //         $sql = "INSERT INTO exercises VALUES('$name', '$bodyPart', '$equipment', '$target', '$image', '$id')";

        //         if (mysqli_query($conn, $sql)) {
        //             echo 'done';

        //         } else {
        //             echo 'query error ' . mysqli_error($conn);
        //         }


        //     }
        
        // }

    }


    
    $email = $_SESSION['email'];

    /**
     * 
     * So we need to get current user and check if they have chosen
     * workout routine
     * 
     * 
     * if (workout_routine is not null) {
     *    display data
     * } else {
     *    redirect to choose workout page
     * }
     * 
     */
    $sql2 = "SELECT workout_routine FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql2);
    $user = mysqli_fetch_assoc($result);
    


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

    <style>
        .exercise-wrapper {
            display: flex;
        }

        .info {
            padding: 30px;
        }

        .pagination {
            width: fit-content;
            margin: 25px auto 0 auto;
        }

        .pagination a {
            margin: 10px;
        }

        .current-page {
            background-color: #dc3545;
            width: 140px;
            text-align: center;
            padding: 10px;
            color: white;
            margin: 0 auto 30px auto;
        }
    </style>
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
                <h4 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase font-weight-bold">START EXERCISING</h4>
                <div class="d-inline-flex">
                    <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Blog Detail Start -->
        <div class="container border-top border-dark pt-5"></div>


        <main class="main-workout">

            <h2 id="routine"><b>Routine: </b><?php echo $user['workout_routine']; ?></h2>
            <br>
            <br>

            <?php 
        
                if ($user['workout_routine'] == null) {
                    // header('Location: workout.php');
                    if (!$_SESSION['loggedin']) {
                        echo("<script>location.href = 'login.php'</script>");
                    }

                    echo("<script>location.href = 'workout.php'</script>");
                } else {

                    // Pagination

                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }

                    $num_per_page = 1;
                    $start_from = ($page - 1) * 1;
            
                    /**
                     * 
                     * if (workout routine matches certain value)
                     * loop through response
                     *    print each element
                     * 
                     */

            
                    switch($user['workout_routine']) {
                        case "Intense Body Building":

                            $sql3 = "SELECT * FROM exercises WHERE target = 'triceps' OR target = 'biceps' OR target = 'abs' limit $start_from,$num_per_page";
                            $data = mysqli_query($conn, $sql3);
                            $exercises = mysqli_fetch_all($data, MYSQLI_ASSOC);
            
                            // $res = json_decode($response, true);
            
                            foreach($exercises as $value) {

                            //     // INTENSE BODY BUILDING LOGIC
            ?>

                                    <div class="current-page">Exercise: <?php echo $page; ?>/<span id="totalExercises"></span></div>
                                    <div class="exercise-wrapper" style="width: 60%; margin: 0 auto 0 auto;">
                                        <div class="image">
                                            <img src="<?php echo $value['image']; ?>" alt="">
                                        </div>
                                        <div class="info">
                                            <h2><b>Name:</b> <?php echo $value['name']; ?></h2>
                                            <h2><b>Body Part:</b> <?php echo $value['body_part']; ?></h2>
                                            <h2><b>Equipment:</b> <?php echo $value['equipment']; ?></h2>
                                            <h2><b>Target:</b> <?php echo $value['target']; ?></h2>

                                            <h1>x 40</h1>
                                        </div>
                                    </div>


            <?php

                            }
            ?>

                <div class="pagination">
                    <?php
                
                    
                            $pg_query = "SELECT * FROM exercises WHERE target = 'triceps' OR target = 'biceps' OR target = 'abs'";

                            $pg_result = mysqli_query($conn, $pg_query);


                            // $total_record = mysqli_num_rows($pg_result );
                            $total_record = count(mysqli_fetch_all($pg_result, MYSQLI_ASSOC));


                            if($page > 1) {
                                echo "<a href='exercise.php?page=".($page - 1)."' class='btn btn-danger'>Previous</a>";
                            }


                            if($total_record > $page){
                                echo "<a href='exercise.php?page=".($page + 1)."' class='btn btn-danger'>Next</a>";
                            }

                        echo '
                        
                            <script>
                            
                                document.getElementById("totalExercises").innerHTML = ' . $total_record . ';
                            
                            </script>
                        
                        ';
                    
                    ?>
                </div>
            
            <?php
                            break;
                        case "Relaxed Body Building";

                            $sql4 = "SELECT * FROM exercises WHERE target = 'glutes' OR target = 'biceps' OR target = 'abs' limit $start_from,$num_per_page";
                            $data2 = mysqli_query($conn, $sql4);
                            $exercises = mysqli_fetch_all($data2, MYSQLI_ASSOC);


                            foreach($exercises as $value) {

                                // RELAXED BODY BUILDING LOGIC

            ?>
                                    
                                    <div class="current-page">Exercise: <?php echo $page; ?>/<span id="totalExercises"></span></div>
                                    <div class="exercise-wrapper" style="width: 60%; margin: 0 auto 0 auto;">
                                        <div class="image">
                                            <img src="<?php echo $value['image']; ?>" alt="">
                                        </div>
                                        <div class="info">
                                            <h2><b>Name:</b> <?php echo $value['name']; ?></h2>
                                            <h2><b>Body Part:</b> <?php echo $value['body_part']; ?></h2>
                                            <h2><b>Equipment:</b> <?php echo $value['equipment']; ?></h2>
                                            <h2><b>Target:</b> <?php echo $value['target']; ?></h2>

                                            <h1>x 20</h1>
                                        </div>
                                    </div>


            <?php
                                

                            }

            ?>

                        <div class="pagination">
                            <?php
                        
                            
                                    $pg_query = "SELECT * FROM exercises WHERE target = 'triceps' OR target = 'biceps' OR target = 'abs'";
        
                                    $pg_result = mysqli_query($conn, $pg_query);
        
        
                                    // $total_record = mysqli_num_rows($pg_result );
                                    $total_record = count(mysqli_fetch_all($pg_result, MYSQLI_ASSOC));
        
        
                                    if($page > 1) {
                                        echo "<a href='exercise.php?page=".($page - 1)."' class='btn btn-danger'>Previous</a>";
                                    }
        
        
                                    if($total_record > $page){
                                        echo "<a href='exercise.php?page=".($page + 1)."' class='btn btn-danger'>Next</a>";
                                    }
        
                                echo '
                                
                                    <script>
                                    
                                        document.getElementById("totalExercises").innerHTML = ' . $total_record . ';
                                    
                                    </script>
                                
                                ';
                            
                            ?>
                        </div>

            <?php
                            echo '';
                            break;
                        case "Intense Toning":

                            $sql4 = "SELECT * FROM exercises WHERE target = 'glutes' OR target = 'biceps' OR target = 'abs' limit $start_from,$num_per_page";
                            $data2 = mysqli_query($conn, $sql4);
                            $toning_results = mysqli_fetch_all($data2, MYSQLI_ASSOC);

                            foreach($toning_results as $value) {

                                // INTENSE TONING LOGIC

                                

            ?>
                                    
                                    <div class="current-page">Exercise: <?php echo $page; ?>/<span id="totalExercises"></span></div>
                                    <div class="exercise-wrapper" style="width: 60%; margin: 0 auto 0 auto;">
                                        <div class="image">
                                            <img src="<?php echo $value['image']; ?>" alt="">
                                        </div>
                                        <div class="info">
                                            <h2><b>Name:</b> <?php echo $value['name']; ?></h2>
                                            <h2><b>Body Part:</b> <?php echo $value['body_part']; ?></h2>
                                            <h2><b>Equipment:</b> <?php echo $value['equipment']; ?></h2>
                                            <h2><b>Target:</b> <?php echo $value['target']; ?></h2>

                                            <h1>x 40</h1>
                                        </div>
                                    </div>


            <?php
                                

                            }

            ?>

                        <div class="pagination">
                            <?php
                        
                            
                                    $pg_query = "SELECT * FROM exercises WHERE target = 'glutes' OR target = 'biceps' OR target = 'abs'";
        
                                    $pg_result = mysqli_query($conn, $pg_query);
        
        
                                    // $total_record = mysqli_num_rows($pg_result );
                                    $total_record = count(mysqli_fetch_all($pg_result, MYSQLI_ASSOC));
        
        
                                    if($page > 1) {
                                        echo "<a href='exercise.php?page=".($page - 1)."' class='btn btn-danger'>Previous</a>";
                                    }
        
        
                                    if($total_record > $page){
                                        echo "<a href='exercise.php?page=".($page + 1)."' class='btn btn-danger'>Next</a>";
                                    }
        
                                echo '
                                
                                    <script>
                                    
                                        document.getElementById("totalExercises").innerHTML = ' . $total_record . ';
                                    
                                    </script>
                                
                                ';
                            
                            ?>
                        </div>

            <?php
            

                            break;
                        case "Relaxed Toning":

                            $sql4 = "SELECT * FROM exercises WHERE target = 'glutes' OR target = 'biceps' OR target = 'abs' limit $start_from,$num_per_page";
                            $data2 = mysqli_query($conn, $sql4);
                            $toning_results = mysqli_fetch_all($data2, MYSQLI_ASSOC);

                            foreach($toning_results as $value) {

                                // RELAXED TONING LOGIC

                                

            ?>
                                    
                                    <div class="current-page">Exercise: <?php echo $page; ?>/<span id="totalExercises"></span></div>
                                    <div class="exercise-wrapper" style="width: 60%; margin: 0 auto 0 auto;">
                                        <div class="image">
                                            <img src="<?php echo $value['image']; ?>" alt="">
                                        </div>
                                        <div class="info">
                                            <h2><b>Name:</b> <?php echo $value['name']; ?></h2>
                                            <h2><b>Body Part:</b> <?php echo $value['body_part']; ?></h2>
                                            <h2><b>Equipment:</b> <?php echo $value['equipment']; ?></h2>
                                            <h2><b>Target:</b> <?php echo $value['target']; ?></h2>

                                            <h1>x 20</h1>
                                        </div>
                                    </div>


            <?php
                                

                            }

            ?>

                        <div class="pagination">
                            <?php
                        
                            
                                    $pg_query = "SELECT * FROM exercises WHERE target = 'glutes' OR target = 'biceps' OR target = 'abs'";

                                    $pg_result = mysqli_query($conn, $pg_query);
        
        
                                    // $total_record = mysqli_num_rows($pg_result );
                                    $total_record = count(mysqli_fetch_all($pg_result, MYSQLI_ASSOC));
        
        
                                    if($page > 1) {
                                        echo "<a href='exercise.php?page=".($page - 1)."' class='btn btn-danger'>Previous</a>";
                                    }
        
        
                                    if($total_record > $page){
                                        echo "<a href='exercise.php?page=".($page + 1)."' class='btn btn-danger'>Next</a>";
                                    }
        
                                echo '
                                
                                    <script>
                                    
                                        document.getElementById("totalExercises").innerHTML = ' . $total_record . ';
                                    
                                    </script>
                                
                                ';
                            
                            ?>
                        </div>

            <?php

                            break;
                        case "Intense Weight Loss":
                            
                            $sql5 = "SELECT * FROM exercises WHERE target = 'biceps' OR target = 'pectorals' OR target = 'abs' OR target = 'quads' limit $start_from,$num_per_page";
                            $data3 = mysqli_query($conn, $sql5);
                            $losing_weight_results = mysqli_fetch_all($data3, MYSQLI_ASSOC);

                            // print_r($losing_weight_results);


                            foreach($losing_weight_results as $value) {

                                // INTENSE LOSING WEIGHT LOGIC

                                

            ?>
                                    
                                    <div class="current-page">Exercise: <?php echo $page; ?>/<span id="totalExercises"></span></div>
                                    <div class="exercise-wrapper" style="width: 60%; margin: 0 auto 0 auto;">
                                        <div class="image">
                                            <img src="<?php echo $value['image']; ?>" alt="">
                                        </div>
                                        <div class="info">
                                            <h2><b>Name:</b> <?php echo $value['name']; ?></h2>
                                            <h2><b>Body Part:</b> <?php echo $value['body_part']; ?></h2>
                                            <h2><b>Equipment:</b> <?php echo $value['equipment']; ?></h2>
                                            <h2><b>Target:</b> <?php echo $value['target']; ?></h2>

                                            <h1>x 20</h1>
                                        </div>
                                    </div>


            <?php
                                

                            }

            ?>

                        <div class="pagination">
                            <?php
                        
                            
                                    $pg_query = "SELECT * FROM exercises WHERE target = 'biceps' OR target = 'pectorals' OR target = 'abs' OR target = 'quads'";
        
                                    $pg_result = mysqli_query($conn, $pg_query);
        
        
                                    $total_record = count(mysqli_fetch_all($pg_result, MYSQLI_ASSOC));

        
                                    if($page > 1) {
                                        echo "<a href='exercise.php?page=".($page - 1)."' class='btn btn-danger'>Previous</a>";
                                    }
        
        
                                    if($total_record > $page){
                                        echo "<a href='exercise.php?page=".($page + 1)."' class='btn btn-danger'>Next</a>";
                                    }
        
                                echo '
                                
                                    <script>
                                    
                                        document.getElementById("totalExercises").innerHTML = ' . $total_record . ';
                                    
                                    </script>
                                
                                ';
                            
                            ?>
                        </div>

            <?php

                            break;
                        case "Relaxed Weight Loss":

                            $sql4 = "SELECT * FROM exercises WHERE target = 'biceps' OR target = 'pectorals' OR target = 'abs' OR target = 'quads' limit $start_from,$num_per_page";
                            $data2 = mysqli_query($conn, $sql4);
                            $toning_results = mysqli_fetch_all($data2, MYSQLI_ASSOC);

                            foreach($toning_results as $value) {

                                // RELAXED LOSING WEIGHT LOGIC

                                

            ?>
                                    
                                    <div class="current-page">Exercise: <?php echo $page; ?>/<span id="totalExercises"></span></div>
                                    <div class="exercise-wrapper" style="width: 60%; margin: 0 auto 0 auto;">
                                        <div class="image">
                                            <img src="<?php echo $value['image']; ?>" alt="">
                                        </div>
                                        <div class="info">
                                            <h2><b>Name:</b> <?php echo $value['name']; ?></h2>
                                            <h2><b>Body Part:</b> <?php echo $value['body_part']; ?></h2>
                                            <h2><b>Equipment:</b> <?php echo $value['equipment']; ?></h2>
                                            <h2><b>Target:</b> <?php echo $value['target']; ?></h2>

                                            <h1>x 20</h1>
                                        </div>
                                    </div>


            <?php
                                

                            }

            ?>

                        <div class="pagination">
                            <?php
                        
                            
                                    $pg_query = "SELECT * FROM exercises WHERE target = 'glutes' OR target = 'biceps' OR target = 'abs'";
        
                                    $pg_result = mysqli_query($conn, $pg_query);
        
        
                                    // $total_record = mysqli_num_rows($pg_result );
                                    $total_record = count(mysqli_fetch_all($pg_result, MYSQLI_ASSOC));
        
        
                                    if($page > 1) {
                                        echo "<a href='exercise.php?page=".($page - 1)."' class='btn btn-danger'>Previous</a>";
                                    }
        
        
                                    if($total_record > $page){
                                        echo "<a href='exercise.php?page=".($page + 1)."' class='btn btn-danger'>Next</a>";
                                    }
        
                                echo '
                                
                                    <script>
                                    
                                        document.getElementById("totalExercises").innerHTML = ' . $total_record . ';
                                    
                                    </script>
                                
                                ';
                            
                            ?>
                        </div>

            <?php

                            break;
                        default:
                            echo 'No choice';
                    }
                }

            ?>


            
                

        </main>


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
            // const options = {
            //     method: 'GET',
            //     headers: {
            //         'X-RapidAPI-Key': 'c4fb6325c5msh57abebb046fdd31p1bd7aajsne398b29cc250',
            //         'X-RapidAPI-Host': 'exercisedb.p.rapidapi.com'
            //     }
            // };

            // fetch('https://exercisedb.p.rapidapi.com/exercises', options)
            //     .then(response => response.json())
            //     .then(response => {

            //         response.forEach(el => {
            //             if (el.bodyPart == 'chest') {
            //                 // Body building
            //             }
            //         });

            //         response.forEach(el => {
            //             // if (el.name.includes('deadlift')) {
            //             //     // Toning
            //             //     console.log(el);
            //             // }
            //         });

            //     })
            //     .catch(err => console.error(err));

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