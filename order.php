<?php

    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    session_start();

    $errors = ['card' => '', 'holder' => '', 'cvv' => ''];

    $address_error = '';
    $card_error = '';

    $house = '';
    $street = '';
    $suburb = '';
    $postal = '';


    if (isset($_POST['done'])) {

        if (empty($_POST['house']) || empty($_POST['street']) || empty($_POST['suburb']) || empty($_POST['postal'])) {
            $address_error = 'All address detaills must be completed';
        } else {
            $house = $_POST['house'];
            $street = $_POST['street'];
            $suburb = $_POST['suburb'];
            $postal = $_POST['postal'];

            $current_loggedin_email = $_SESSION['email'];

            include('connect.php');

            if (!empty($_SESSION['cart'])) {
                $total = 0;
                $no_of_items = 0;
                foreach($_SESSION['cart'] as $keys => $values) {
                    
                    $name = $values['name'];
                    $price = $values['price'];
                    $qty = $values['qty'];
                    $address = $house . '+' . $street . '+' . $suburb . '+' . $postal;

                    $sql = "INSERT INTO orders(email,name,price,quantity,address) VALUES('$current_loggedin_email', '$name', $price, $qty, '$address')";

                    if (mysqli_query($conn, $sql)) {
                        // done
                    } else {
                        echo 'query error ' . mysqli_error($conn);
                    }

                }
            }
            
            

            $mail = new PHPMailer();
    
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = "true";
            $mail->SMTPSecure = "tls";
            $mail->Port = "587";
            $mail->Username = "onodwasiyotula7@gmail.com";
            $mail->Password = "cljpvyrrwqcbytwm";
            $mail->Subject = "Order Successful";
            $mail->setFrom("onodwasiyotula7@gmail.com", "Mercury Fitness");
            $mail->isHTML(true);
            $mail->Body = "<div class='email'>
                                <h1>You have successfully ordered your item(s)</h1>
                                <br/>
                                <p>Item(s) to be delivered on " . date("F j, Y, g:i a", strtotime('+2 day', time())) . "</p>
                                <br/>


                                <h2>Have the R " . number_format($_SESSION['total'], 2) . " ready on the day of delivery</h2>
                            </div>";
            $mail->addAddress($current_loggedin_email);

        
            if ($mail->Send()) {
                echo '<script>location.href = "successful.html"</script>';
            } else {
                echo "Err";
            }
        
            $mail->smtpClose();


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

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>

    <style>

        * {
            font-family: sans-serif;
        }

        /* .inputs {
            display: grid;
            grid-template-columns: 50% 50%;
        } */

        .order {
            width: 80%;
            margin-left: 10%;
        }

        .order input {
            margin-bottom: 10px;
            padding: 7px 0px 7px 0px;
        }

        input::placeholder {
            padding-left: 7px;
        }

        .order form {
            background-color: white;
            margin-top: 30px;
            padding-top: 20px;
        }

        .location h2 {
            text-align: center;
        }

        .payment h2 {
            text-align: center;
        }

        .location div {
            width: 90%;
            margin: 0 auto;
        }

        .location input {
            width: 100%;
        }


        .payment div {
            width: fit-content;
            margin: 0 auto;
        }

        .done {
            width: fit-content;
            margin: 0 auto;
        }

        .done button {
            padding: 7px;
            width: 540px;
            margin-bottom: 40px;
            margin-top: 30px;
            background-color: rgb(10, 200, 10);
            color: white;
            border: none;
        }

        .done button:hover {
            cursor: pointer;
        }

        .amount_to_pay {
            background-color: rgb(240, 240, 240);
            width: fit-content;
            margin: 0 auto;
            margin-top: 13px;
            padding: 10px;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.3);
        }

        #map {
            height: 300px;
            width: 80%;
            margin-left: 10%;
        }

        body {
            display: grid;
            grid-template-columns: 50% 50%;
            padding-top: 50px;
        }

    </style>
</head>
<body style="background-color: rgb(255 211 211 / 80%)">

    <div class="order">
        <form action="order.php" method="POST">
            <div class="inputs">
                <div class="location">
                    <h2>Give us your location</h2>
                    <p style="text-align: center; color: red;"><?php echo $address_error; ?><p>
                    <div class="house-no">
                        <input type="number" placeholder="House No." name="house" id="" value="<?php echo htmlspecialchars($house); ?>">
                    </div>
                    <div class="street">
                        <input type="text" placeholder="Street Name" name="street" id="" value="<?php echo htmlspecialchars($street); ?>">
                    </div>
                    <div class="suburb">
                        <input type="text" placeholder="Suburb/City" name="suburb" id="" value="<?php echo htmlspecialchars($suburb); ?>">
                    </div>
                    <div class="postal">
                        <input type="number" placeholder="Postal Code" name="postal" id="" value="<?php echo htmlspecialchars($postal); ?>">
                    </div>
                </div>
                

                <div class="amount_to_pay">
                    <!-- <br> -->
                    Balance: ZAR <?php echo number_format($_SESSION['total'], 2); ?>
                </div>
            </div>

            <div class="done">
                <br>
                <button name="done">Place Order</button>
            </div>
        </form>

    </div>

    <div id="map">
    </div>

    <script>

        var map = L.map('map').setView([-34.052610, 18.656270], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([-34.052610,18.656270]).addTo(map)
            .bindPopup('10 Nonqane Street, Ilitha Park')
            .openPopup();
        
        // // initialize the map on the "map" div with a given center and zoom
        // var map = L.map('map', {
        //     center: [-34.052610, 18.656270],
        //     zoom: 13
        // });


        fetch('https://data.opendatasoft.com/api/records/1.0/search/?dataset=geonames-postal-code%40public&q=SA&facet=country_code&facet=admin_name1&facet=admin_code1&facet=admin_name2&refine.country_code=ZA')
            .then((data) => data.json())
            .then((res) => console.log(res))
            .catch((err) => console.log(err));

    </script>
    
</body>
</html>