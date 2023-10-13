<?php

session_start();

if (isset($_SESSION['loggedInUser'])) {
    $msg = "Welkom, " . $_SESSION['loggedInUser'];
} else {
    $msg = "LOG-IN";
}

if (!isset($_SESSION['loggedInUser'])) {
    header('location: ../login/login.php');
    echo "<script>alert('U moet ingelogd zijn om bij uw winkelwagen te komen');</script>";
}

$pdo = new PDO('mysql:host=localhost;dbname=wheelsoffortune;charset=utf8', 'bit_academy', 'bit_academy');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelwagen</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/cart.css">
</head>

<body>
    <nav>
        <img class="foto" src="../images/WHEELS OF FORTUNE.png">
        <ul>
            <li class="menu"><a href="../index.php">HOME</a></li>
            <li class="menu">
                <a class="automerken" href="">AUTOMERKEN</a>
                <ul class="dropdown">
                    <li><a href="../index.php?sort=BMW">BMW</a></li>
                    <li><a href="../index.php?sort=mercedes">Mercedes</a></li>
                    <li><a href="../index.php?sort=audi">Audi</a></li>
                    <li><a href="../index.php?sort=volkswagen">Volkswagen</a></li>
                    <li><a href="../index.php?sort=ford">Ford - pickups</a></li>
                    <li><a href="../index.php?sort=dodge">Dodge</a></li>
                    <li><a href="../index.php?sort=jeep">Jeep</a></li>
                    <li><a href="../index.php?sort=lexus">Lexus</a></li>
                    <li><a href="../index.php?sort=land_rover">Land Rover</a></li>
                    <li><a href="../index.php?sort=mini">Mini</a></li>
                </ul>
            </li>
            <li class="menuabout">
                <a href="">ABOUT US</a>
                <ul class="dropdown">
                    <li><a href="../aboutus.php?naam=Daan">Daan</a></li>
                    <li><a href="../aboutus.php?naam=Stefan">Stefan</a></li>
                    <li><a href="../aboutus.php?naam=Collin">Collin</a></li>
                    <li><a href="../aboutus.php?naam=Senna">Senna</a></li>
                </ul>
            </li>
            <li class="ff">
                <a href="../login/login.php"><?php echo $msg ?></a>
                <?php
                if (isset($_SESSION['loggedInUser'])) {
                    echo '<ul class="dropdown">
                                <li><a href="../logout.php">Uitloggen</a></li>
                            </ul>';
                }

                ?>
            </li>
        </ul>
        <li class="lishoppingcart"><a href="cart.php"><img class="shoppingcart" src="../icons/icons8-shopping-cart-96.png"></a></li>
    </nav>
    <div class="cart">
        <?php
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "<h1>Uw heeft nog niks in uw winkelwagen.</h1>";
        } else {
        ?>
            <table class="autos">
                <tr>
                    <th></th>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>prijs</th>
                    <th>Aantal</th>
                </tr>
            <?php
            $subtotal = 0;
            foreach ($_SESSION['cart'] as $id) {
                $stmt = $pdo->prepare('SELECT * FROM cars WHERE id = :id');
                $stmt->execute(array(':id' => $id));
                $car = $stmt->fetch(PDO::FETCH_ASSOC);
                echo   "<tr>
                        <td><img src='../images/cars/" . $car['image_url'] . "' id='img'></td>
                        <td>" . $car['type'] . "</td>
                        <td>" . $car['model'] . "</td>
                        <td>€" . $car['price'] . "</td>
                        <td>1</td>
                        <td><a href='delete-from-cart.php?id=$id'>Verwijder</a></td>
                    </tr>";
                $subtotal += $car['price'];
            }
        }
            ?>
            </table>
            <?php
            if (!empty($_SESSION['cart'])) {
                echo "<p class='totaal' >Totaal: €" .  $subtotal . ",-</p>";
            }
            ?>

    </div>



</body>

</html>