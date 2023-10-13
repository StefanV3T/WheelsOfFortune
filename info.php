<?php

session_start();

if (isset($_SESSION['loggedInUser'])) {
    $msg = "Welkom, " . $_SESSION['loggedInUser'];
} else {
    $msg = "LOG-IN";
}

$pdo = new PDO('mysql:host=localhost;dbname=wheelsoffortune;charset=utf8', 'bit_academy', 'bit_academy');


if (!isset($_GET['id'])) {
    echo "Er is geen ID meegegeven.";
    exit();
}


$id = htmlspecialchars($_GET['id']);


$stmt = $pdo->prepare('SELECT * FROM cars WHERE id = :id');
$stmt->execute(array(':id' => $id));


if ($stmt->rowCount() == 0) {
    echo "Deze auto bestaat niet.";
    exit();
}


$car = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/info.css">
    <link rel="stylesheet" href="css/main.css">
    <title><?php echo $car['type'] . " " . $car['model']; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

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
    <div class="info">


        <div class="carInfo">
            <img src="images/cars/<?php echo $car['image_url'] ?>">
            <div class="bar">
                <h1><?php echo $car['type'] . " " . $car['model'] ?></h1>
                <h1><a href='cart/add-to-cart.php?id=<?php echo $car['id'] ?>'><img class="shoppingcart" src="icons/shop-bag.png"></a></h1>
            </div>

            <div class="allbox">
                <div class="box">
                    <h1>SPECIFICATIES</h1>
                    <div class="infos">
                        <div class="infobox">
                            <p>kleur</p>
                            <p><?php echo $car['color'] ?></p>
                        </div>
                        <div class="infobox">
                            <p>motor</p>
                            <p><?php echo $car['engine'] ?></p>
                        </div>
                        <div class="infobox">
                            <p>vermogen</p>
                            <p><?php echo $car['horse_power'] ?> pk</p>
                        </div>
                        <div class="infobox">
                            <p>Bouwjaar</p>
                            <p><?php echo $car['year_of_release'] ?></p>
                        </div>


                    </div>

                </div>
                <div class="box">
                    <h1>OVER</h1>
                    <p><?php echo $car['summary'] ?></p>
                </div>


            </div>
            <div class="kopen">
                <p>Vanaf €<?php echo $car['price'] . ',-' ?></p>
                <p>Wees snel! er zijn nog maar <?php echo $car['amount'] ?> auto's beschikbaar!</p>
                <h1><a href='cart/add-to-cart.php?id=<?php echo $car['id'] ?>'><img class="shoppingcart" src="icons/shop-bag.png"></a></h1>
            </div>

        </div>


    </div>
</body>

</html>