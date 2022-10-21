<?php 

    session_start();

    include('connect.php');

    $errors = ['first_name' => '', 'last_name' => '', 'email' => '', 'password' => ''];

    $fname = '';
    $lname = '';
    $email = '';
    $password = '';

    if (isset($_POST['submit'])) {

        // check valid inputs
        if (empty($_POST['email'])) {
            $errors['email'] = 'email is required';
        } else {
            $email = $_POST['email'];

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'email must be valid email address';
            }
        }

        if (empty($_POST['password'])) {
            $errors['password'] = 'password is required';
        } else {
            $password = $_POST['password'];

            if (sizeof(str_split($password)) < 6) {
                $errors['password'] = 'minimum of 6 characters required';
            }
        }

        if(!array_filter($errors)) {

            $email = mysqli_real_escape_string($conn, $_POST['email']);
            // $first_name = mysqli_real_escape_string($conn, $_POST['fname']);
            // $last_name = mysqli_real_escape_string($conn, $_POST['lname']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";


            if (mysqli_query($conn, $sql)) {
                // header('Location: Single.html');
                
                $user = mysqli_query($conn, $sql);

                $result = mysqli_fetch_all($user, MYSQLI_ASSOC);

                if (!empty($result)) {
                    if($password == $result[0]['password'] && $email == $result[0]['email']) {
                        // header('Location: Single.php');
                        echo '<script>location.href = "Single.php"</script>';

                        $_SESSION['email'] = $result[0]['email'];
                        $_SESSION['fname'] = $result[0]['first_name'];
                        $_SESSION['lname'] = $result[0]['last_name'];
                        $_SESSION['created_at'] = $result[0]['created_at'];

                        $logged = true;

                        $_SESSION['loggedin'] = $logged;
                    }
                } else {
                    $errors['password'] = 'Incorrect password';
                }

                if ($password == 'password' && $email == 'admin@mercury.com') {
                    header('Location: admin.php');

                    $admin = true;
                    $_SESSION['admin'] = $admin;
                }


            } else {
                echo 'query error ' . mysqli_error($conn);
            }

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

    <style>

        * {
            font-family: sans-serif;
        }

        [id='contactForm'] input {
            /* width: 100%; */
        }

        [id='btn'] {
            /* padding: 10px; */
        }

        h1 {
            z-index: 1;
            position: relative;
            color: white;
        }

        .form-wrapper {
            background-color: #332c2c;
            padding: 30px;

            width: fit-content;
            margin: auto auto;
            margin-top: 60px;

            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            opacity: 0.9;
            z-index: 1;
            position: relative;
        }

        .form-wrapper:hover {
            transform: scale(1.01, 1.01);
            opacity: 1;
            transition: .3s;
        }

        .form-wrapper input:focus {
            background-color: #f0f2f5;
            transition: .3s;
        }

        .form-group {
            width: 400px;
        }

        .log-btn button {
            background-color: #e31c25!important;
            color: white;
            border: none;
        }

        .log-btn button:hover {
            transition: .3s;
            opacity: .7;
        }

        label {
            color: white;
        }

        .background {
            height: 50vh;
            background-color: #961717;
            top: 0;
            position: fixed;
            width: 120%;
            margin-left: -10%;
            z-index: 0;
            border-radius: 0 0 50% 50%;
        }

    </style>

    <body style="background-color: rgb(255 211 211 / 80%);">

        <br>
        <br>
        <br>

        <h1 style="text-align: center;">Sign in to your account</h1>

        <div class="form-wrapper form-row">

            <form id="contactForm" action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Your Email"
                            value="<?php echo htmlspecialchars($email); ?>" />
                    <p style="color: red;"><?php echo $errors['email']; ?></p>
                </div>

                <div class="control-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="subject" placeholder="password"
                            value="<?php echo $password; ?>" />
                    <p style="color: red;"><?php echo $errors['password']; ?></p>
                </div>
                
                <p style="text-align: right;"><a href="register.php" style="color: #e31c25!important; text-decoration: none;">Don't have an account?</a></p>

                <div class="log-btn">
                    <button id="btn" class="btn btn-outline-primary" name="submit" type="submit">Login</button>
                </div>
            </form>

        </div>
    
        <div class="background"></div>
    </body>
</html>