<?php 

    session_start();

    if (!isset($_SESSION['admin'])) {
        header('Location: login.php');
    }

    if (isset($_POST['add_item'])) {

        include('connect.php');

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $stock = mysqli_real_escape_string($conn, $_POST['stock']);
        $image = $_FILES['myFile']['name'];
    
        $target = "images/store-items/".basename($image);

        $sql = "INSERT INTO products(product_name,price,items_in_stock, image) VALUES('$name', '$price', '$stock', '$image')";

        if (mysqli_query($conn, $sql) && move_uploaded_file($_FILES['myFile']['tmp_name'], $target)) {
            echo 'Items added';

        } else {
            echo 'query error ' . mysqli_error($conn);
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

    <style>
        * {
            font-family: sans-serif;
        }

        .form-wrapper {
            margin-top: 40px;
        }

        .form-wrapper div {
            width: 500px;
            margin: 0 auto;
            margin-bottom: 12px;
        }

        .form-wrapper h2 {
            text-align: center;
        }

        .form-wrapper div input {
            padding: 10px;
            width: 100%;
        }

        .form-wrapper button {
            padding: 10px;
            /* width: 100%; */
            width: calc(100% + 22px);
        }
    </style>

</head>
<body>
    
    <div class="form-wrapper">
        <h2>Add new items</h2>

        <form action="admin.php" method="POST" enctype="multipart/form-data">
            <div class="name">
                <input type="text" placeholder="Product Name" name="name" id="">
            </div>
            <div class="price">
                <input type="text" placeholder="Price" name="price" src="" alt="">
            </div>
            <div class="image">
                <input type="file" name="myFile" id="">
            </div>
            <div class="stock">
                <input type="number" placeholder="Items in stock" name="stock" id="">
            </div>

            <div class="add">
                <button name="add_item">Submit</button>
            </div>

        </form>

    </div>
    



</body>
</html>