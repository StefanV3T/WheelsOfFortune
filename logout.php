<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOEI</title>
</head>

<body>
    <?php
    if (isset($_SESSION['loggedInUser'])) {
        session_destroy();
        header("Location: index.php");
        exit();
    }

    ?>
</body>

</html>