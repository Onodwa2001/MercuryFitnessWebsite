<?php 

    if (isset($_POST['logout'])) {
        unset($_SESSION['loggedin']);
        unset($_SESSION['admin']);
        session_unset();

        header('Location: login.php');
    }

?>