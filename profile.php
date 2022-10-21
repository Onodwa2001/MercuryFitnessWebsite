<?php 

    session_start();


    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
    }

    include('connect.php');

    $email = $_SESSION['email'];

    $sql = "SELECT * FROM users WHERE email = '$email'";

    if (mysqli_query($conn, $sql)) {
    
        $user = mysqli_query($conn, $sql);

        $result = mysqli_fetch_all($user, MYSQLI_ASSOC);

        // echo print_r($result);
    
    }

    if (isset($_POST['first_name'])) {
        $name_input = $_POST['name_input'];

        if (!empty($_POST['name_input'])) {
            $sql2 = "UPDATE users SET first_name = '$name_input' WHERE email = '$email'";
            
            if (mysqli_query($conn, $sql2)) {
                header('Location: profile.php');

            } else {
                echo 'query error ' . mysqli_error($conn);
            }
        }
    }

    if (isset($_POST['last_name'])) {
        $surname_input = $_POST['surname_input'];

        if (!empty($_POST['surname_input'])) {
            $sql2 = "UPDATE users SET last_name = '$surname_input' WHERE email = '$email'";
            
            if (mysqli_query($conn, $sql2)) {
                header('Location: profile.php');

            } else {
                echo 'query error ' . mysqli_error($conn);
            }
        }
    }

    if (isset($_POST['workout'])) {
        $workout_input = $_POST['workout_input'];

        if (!empty($_POST['workout_input'])) {
            $sql3 = "UPDATE users SET workout_routine = '$workout_input' WHERE email = '$email'";
            
            if (mysqli_query($conn, $sql3)) {
                header('Location: profile.php');

            } else {
                echo 'query error ' . mysqli_error($conn);
            }
        }
    }

    include('logout/logoutPHPCode.php');


    $msg = "";

    if (isset($_POST['upload'])) {

        $image = $_FILES['myFile']['name'];
  
        $target = "images/profile-images/".basename($image);
  
        $sql = "UPDATE users SET image = '$image' WHERE email = '$email'";
        
        mysqli_query($conn, $sql);
  
        if (move_uploaded_file($_FILES['myFile']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
            header('Location: profile.php');
        }else{
            $msg = "Failed to upload image";
        }
    }

    // $result = mysqli_query($db, "SELECT * FROM images");

?>

<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mercury Fitness: Contact Us</title>
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
    <!-- <link href="img/favicon.ico" rel="icon"> -->

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">

    <style>
        .detail-wrap form {
            width: fit-content;
            margin-left: auto;
            margin-right: right;
        }

        .update {
            display: none;
        }

        .profile-photo img {
            border-radius: 50%;
            border: solid white 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .card {
            margin: 0 auto;
            margin-bottom: 150px;
        }

        .upload button {
            border: none;
            background-color: red;
            color: white;
            padding: 4px;
            padding-left: 12px;
            padding-right: 12px;
        }

        [id="change"] {
            border: none;
            background-color: red;
            padding: 10px;
            color: white;
        }

        @media screen and (max-width: 476px) {
            
            .card {
                width: 90% !important;
                margin-left: auto;
                margin-right: right;
            }

        }
    </style>
</head>
<a href="Contact.html">

    <body style="background-color: rgb(255 211 211 / 80%);">

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


        <div class="">
            <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5"
                style="min-height: 240px">
                <br>
                <br>
                <br>
                <br>
                
            </div>
        </div>
        <!-- Page Header End -->


        <h1 style="text-align: center;">Profile</h1>


        <div class="profile-photo" style="width: fit-content; margin: auto auto;">
            <img src="images/profile-images/<?php echo $result[0]['image']; ?>" width="100px" height="100px" alt="photo">
        </div>
        <br>

        <div class="change_profile_pic" style="width: fit-content; margin: auto auto;">
            <button id="change">Change Profile Picture</button>
        </div>
        <br>
        
        <div id="upload-wrapper" style="display: none;">
            <div class="upload" style="width: fit-content; margin: auto auto; margin-bottom: 40px;">
                <form action="profile.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="myFile" id="">
                    <br>
                    <br>
                    <button name="upload">Upload</button>
                </form>
            </div>
        </div>

        <div class="card" style="width: 60%; padding: 30px;">
            <div class="detail-wrap" style="display: grid; grid-template-columns: 50% 50%;">
                <h4><b>First Name:</b> <?php echo $result[0]['first_name']; ?></h4>
                <form action="profile.php" method="POST">
                    <button id="f_name" class="edit">Edit</button>

                    <div class="update" id="update_name">
                        <input type="text" name="name_input">
                        <button name="first_name" class="update-btn" type="submit">update</button>
                    </div>
                </form>
            </div>
            <div class="detail-wrap" style="display: grid; grid-template-columns: 50% 50%;">
                <h4><b>Last Name:</b> <?php echo $result[0]['last_name']; ?></h4>
                <form action="profile.php" method="POST">
                    <button id="l_name" class="edit">Edit</button>

                    <div class="update" id="update_surname">
                        <input type="text" name="surname_input">
                        <button name="last_name" class="update-btn">update</button>
                    </div>
                </form>
            </div>
            <div class="detail-wrap">
                <h4><b>Email:</b> <?php echo $result[0]['email']; ?></h4>
            </div>
            <div class="detail-wrap" style="display: grid; grid-template-columns: 60% 40%;">
                <h4><b>Workout Routine:</b> <?php echo $result[0]['workout_routine'] ?></h4>
                <form action="profile.php" method="POST">
                    <button id="workout" class="ëdit">Edit</button>

                    <div class="update" id="update_workout">
                        <!-- <input type="text" name="workout_input"> -->
                        <select name="workout_input" id="">
                            <option value="Intense Body Building">Intense Body Building</option>
                            <option value="Relaxed Body Building">Relaxed Body Building</option>
                            <option value="Intense Toning">Intense Toning</option>
                            <option value="Relaxed Toning">Relaxed Toning</option>
                            <option value="Intense Weight Loss">Intense Weight Loss</option>
                            <option value="Relaxed Weight Loss">Relaxed Weight Loss</option>
                        </select>
                        <button name="workout" class="update-btn">update</button>
                    </div>
                </form>
            </div>
            <div class="detail-wrap" style="display: grid; grid-template-columns: 50% 50%;">
                <h4><b>Joined:</b> <?php echo $result[0]['created_at']; ?> </h4>
            </div>
        </div>
       
        <script>

            let fname = document.getElementById('f_name');
            let lname = document.getElementById('l_name');
            let workout = document.getElementById('workout');
            let change = document.getElementById('change');

            change.addEventListener('click', (e) => {
                e.preventDefault();
                change.style.display = 'none';
                document.getElementById('upload-wrapper').style.display = 'block';
            });

            fname.addEventListener('click', (e) => {
                e.preventDefault();
                fname.style.display = 'none';
                document.getElementById('update_name').style.display = 'block';
            });

            lname.addEventListener('click', (e) => {
                e.preventDefault();
                lname.style.display = 'none';
                document.getElementById('update_surname').style.display = 'block';
            });

            workout.addEventListener('click', (e) => {
                e.preventDefault();
                workout.style.display = 'none';
                document.getElementById('update_workout').style.display = 'block';
            });

            document.getElementsByClassName('update-btn').forEach(element => {
                element.addEventListener('click', (e) => {
                    e.preventDefault();
                    
                    fname.style.display = 'block';
                    lname.style.display = 'block';
                    workout.style.display = 'block';
                    document.getElementById('update_workout').style.display = 'none';
                });
            });

        </script>
       

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