<?php

session_start();

if (isset($_SESSION['loggedInUser'])) {
    $msg = "Welkom, " . $_SESSION['loggedInUser'];
} else {
    $msg = "LOG-IN";
}

$config = [
    'host' => 'localhost',
    'dbname'   => 'WheelsOfFortune',
    'user' => 'bit_academy',
    'password' => 'bit_academy',
];

$dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'];
$user = $config['user'];
$password = $config['password'];
$pdo = new PDO($dsn, $user, $password);

$db_host = 'localhost';
$db_user = 'bit_academy';
$db_pass = 'bit_academy';
$db_name = 'WheelsOfFortune';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$naam = $_GET['naam'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/aboutus.css">
    <link rel="stylesheet" href="css/main.css">
    <title>About us!</title>
</head>

<body>
    <nav>
        <img class="foto" src="images/WHEELS OF FORTUNE.png">
        <ul>
            <li class="menu"><a href="index.php">HOME</a></li>
            <li class="menu">
                <a class="automerken">AUTOMERKEN</a>
                <ul class="dropdown">
                    <li><a href="index.php?sort=BMW">BMW</a></li>
                    <li><a href="index.php?sort=mercedes">Mercedes</a></li>
                    <li><a href="index.php?sort=audi">Audi</a></li>
                    <li><a href="index.php?sort=volkswagen">Volkswagen</a></li>
                    <li><a href="index.php?sort=ford">Ford - pickups</a></li>
                    <li><a href="index.php?sort=dodge">Dodge</a></li>
                    <li><a href="index.php?sort=jeep">Jeep</a></li>
                    <li><a href="index.php?sort=lexus">Lexus</a></li>
                    <li><a href="index.php?sort=land_rover">Land Rover</a></li>
                    <li><a href="index.php?sort=mini">Mini</a></li>
                </ul>
            </li>
            <li class="menuabout">
                <a href="#">ABOUT US</a>
                <ul class="dropdown">
                    <li><a href="aboutus.php?naam=Daan">Daan</a></li>
                    <li><a href="aboutus.php?naam=Stefan">Stefan</a></li>
                    <li><a href="aboutus.php?naam=Collin">Collin</a></li>
                    <li><a href="aboutus.php?naam=Senna">Senna</a></li>
                </ul>
            </li>
            <li class="ff">
                <a href="login/login.php"><?php echo $msg ?></a>
                <?php
                if (isset($_SESSION['loggedInUser'])) {
                    echo '<ul class="dropdown">
                                <li><a href="logout.php">Uitloggen</a></li>
                            </ul>';
                }

                ?>
            </li>
        </ul>
        <li class="lishoppingcart"><a href="cart/cart.php"><img class="shoppingcart" src="icons/icons8-shopping-cart-96.png"></a></li>
    </nav>
    <div class="lichaam">
        <?php
        $query = $pdo->query('SELECT * FROM owners WHERE naam = "' . $naam . '"');

        ?>
        <div class="iets">
            <?php
            $query = $pdo->query('SELECT * FROM owners WHERE naam = "' . $naam . '"');

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="userInfo">
    <p class="naam" >' . $row['naam'] . '</p>
    <p class="leeftijd" > ' . 'Leeftijd: '  . $row['age'] . '</p>
    <p class="klas" > ' . 'Klas: '  . $row['class'] . '</p>
    <p class="instagram" >' . 'Instagram: ' . $row['instagram'] . '</p>
    <p class="snapchat" > ' . 'Snapchat: ' . $row['snapchat'] . '</p>
    <p class="summary">' . 'Beschijving: ' . $row['summary'] . '</p>
    </div>';
            }
            ?>

</body>

</html>