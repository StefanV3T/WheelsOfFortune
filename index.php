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

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'title';
$query = $pdo->query('SELECT * FROM cars');
$sql = "SELECT image_url FROM cars ORDER BY RAND() LIMIT 1";
if ($sort == 'BMW') {
    $sql = "SELECT image_url FROM cars WHERE type = 'BMW' ORDER BY RAND() LIMIT 1";
    $query = $pdo->query('SELECT * FROM cars WHERE type = "BMW"');
}
if ($sort == 'mercedes') {
    $sql = "SELECT image_url FROM cars WHERE type = 'mercedes' ORDER BY RAND() LIMIT 1";
    $query = $pdo->query('SELECT * FROM cars WHERE type = "mercedes"');
}
if ($sort == 'audi') {
    $sql = "SELECT image_url FROM cars WHERE type = 'audi' ORDER BY RAND() LIMIT 1";
    $query = $pdo->query('SELECT * FROM cars WHERE type = "audi"');
}
if ($sort == 'volkswagen') {
    $sql = "SELECT image_url FROM cars WHERE type = 'volkswagen' ORDER BY RAND() LIMIT 1";
    $query = $pdo->query('SELECT * FROM cars WHERE type = "volkswagen"');
}
if ($sort == 'ford') {
    $sql = "SELECT image_url FROM cars WHERE type = 'ford-pickup' ORDER BY RAND() LIMIT 1";
    $query = $pdo->query('SELECT * FROM cars WHERE type = "ford-pickup"');
}
if ($sort == 'dodge') {
    $sql = "SELECT image_url FROM cars WHERE type = 'dodge' ORDER BY RAND() LIMIT 1";
    $query = $pdo->query('SELECT * FROM cars WHERE type = "dodge"');
}
if ($sort == 'jeep') {
    $sql = "SELECT image_url FROM cars WHERE type = 'jeep' ORDER BY RAND() LIMIT 1";
    $query = $pdo->query('SELECT * FROM cars WHERE type = "jeep"');
}
if ($sort == 'lexus') {
    $sql = "SELECT image_url FROM cars WHERE type = 'lexus' ORDER BY RAND() LIMIT 1";
    $query = $pdo->query('SELECT * FROM cars WHERE type = "lexus"');
}
if ($sort == 'land_rover') {
    $sql = "SELECT image_url FROM cars WHERE type = 'landrover' ORDER BY RAND() LIMIT 1";
    $query = $pdo->query('SELECT * FROM cars WHERE type = "landrover"');
}
if ($sort == 'mini') {
    $sql = "SELECT image_url FROM cars WHERE type = 'mini' ORDER BY RAND() LIMIT 1";
    $query = $pdo->query('SELECT * FROM cars WHERE type = "mini"');
}

$filter = isset($_GET['filter']) ? $_GET['filter'] : 'title';
if ($filter == "laagNaarHoog") {
    $query = $pdo->query('SELECT * FROM cars ORDER BY price ASC');
}
if ($filter == "hoogNaarLaag") {
    $query = $pdo->query('SELECT * FROM cars ORDER BY price DESC');
}
if ($filter == "laagNaarHoogPK") {
    $query = $pdo->query('SELECT * FROM cars ORDER BY horse_power ASC');
}
if ($filter == "hoogNaarLaagPK") {
    $query = $pdo->query('SELECT * FROM cars ORDER BY horse_power DESC');
}
if ($filter == "benzine") {
    $query = $pdo->query('SELECT * FROM cars WHERE engine = "benzine"');
}
if ($filter == "diesel") {
    $query = $pdo->query('SELECT * FROM cars WHERE engine = "diesel"');
}
if ($filter == "elektrisch") {
    $query = $pdo->query('SELECT * FROM cars WHERE engine = "elektrisch"');
}
if ($filter == "zwart") {
    $query = $pdo->query('SELECT * FROM cars WHERE color = "zwart"');
}
if ($filter == "wit") {
    $query = $pdo->query('SELECT * FROM cars WHERE color = "wit"');
}
if ($filter == "rood") {
    $query = $pdo->query('SELECT * FROM cars WHERE color = "rood"');
}
if ($filter == "blauw") {
    $query = $pdo->query('SELECT * FROM cars WHERE color = "blauw"');
}
if ($filter == "groen") {
    $query = $pdo->query('SELECT * FROM cars WHERE color = "groen"');
}
if ($filter == "geel") {
    $query = $pdo->query('SELECT * FROM cars WHERE color = "geel"');
}
if ($filter == "paars") {
    $query = $pdo->query('SELECT * FROM cars WHERE color = "paars"');
}
if ($filter == "oranje") {
    $query = $pdo->query('SELECT * FROM cars WHERE color = "oranje"');
}
if ($filter == "grijs") {
    $query = $pdo->query('SELECT * FROM cars WHERE color = "grijs"');
}
if ($filter == "bruin") {
    $query = $pdo->query('SELECT * FROM cars WHERE color = "bruin"');
}
if ($filter == "zilver") {
    $query = $pdo->query('SELECT * FROM cars WHERE color = "zilver"');
}
if ($filter == "roze") {
    $query = $pdo->query('SELECT * FROM cars WHERE color = "roze"');
}
if ($filter == "transparant") {
    $query = $pdo->query('SELECT * FROM cars WHERE color = "transparant"');
}
if ($filter == "multicolor") {
    $query = $pdo->query('SELECT * FROM cars WHERE color = "multicolor"');
}
if ($filter == "new") {
    $query = $pdo->query('SELECT * FROM cars ORDER BY year_of_release DESC');
}
if ($filter == "old") {
    $query = $pdo->query('SELECT * FROM cars ORDER BY year_of_release ASC');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheels Of Fortune</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
    <nav>
        <img class="foto" src="images/WHEELS OF FORTUNE.png">
        <ul>
            <li class="menu"><a href="index.php">HOME</a></li>
            <li class="menu">
                <a class="automerken" href="">AUTOMERKEN</a>
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
                <a href="">ABOUT US</a>
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
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="images/cars/<?php
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $imageUrl = $row['image_url'];
                                    echo $imageUrl;
                                    ?>">
        </div>
        <div class="mySlides fade">
            <img src="images/cars/<?php
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $imageUrl = $row['image_url'];
                                    echo $imageUrl;
                                    ?>">
        </div>
        <div class="mySlides fade">
            <img src="images/cars/<?php
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $imageUrl = $row['image_url'];
                                    echo $imageUrl;
                                    ?>">
        </div>
        <div class="mySlides fade">
            <img src="images/cars/<?php
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $imageUrl = $row['image_url'];
                                    echo $imageUrl;
                                    ?>">
        </div>
    </div>
    <br>
    <div>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <div class="all">
        <div class="balklinks">
            <h1>FILTERS</h1>

            <ol>
                <dl>
                    <dt><strong>Prijs</strong></dt>
                    <br>
                    <dd><a href="?filter=laagNaarHoog">◄ Laag naar hoog</a></dd>
                    <dd><a href="?filter=hoogNaarLaag">◄ Hoog naar laag</a></dd>
                </dl>
                <dl>
                    <dt><strong>pk</strong></dt>
                    <dd><a href="?filter=laagNaarHoogPK">◄ Laag naar hoog</a></dd>
                    <dd><a href="?filter=hoogNaarLaagPK">◄ Hoog naar laag</a></dd>
                </dl>
                <dl>
                    <dt><strong>Brandstof</strong></dt>
                    <br>
                    <dd><a href="?filter=benzine">◄ Benzine</a></dd>
                    <dd><a href="?filter=diesel">◄ Diesel</a></dd>
                    <dd><a href="?filter=elektrisch">◄ Elektrisch</a></dd>
                </dl>
                <dl>
                    <dt><strong>kleur</strong></dt>
                    <br>
                    <dd><a href="?filter=zwart"><span class="black">oo</span> Zwart</a></dd>
                    <dd><a href="?filter=wit"><span class="white">oo</span> Wit</a></dd>
                    <dd><a href="?filter=rood"><span class="red">oo</span> Rood</a></dd>
                    <dd><a href="?filter=blauw"><span class="blue">oo</span> Blauw</a></dd>
                    <dd><a href="?filter=groen"><span class="green">oo</span> Groen</a></dd>
                    <dd><a href="?filter=geel"><span class="yellow">oo</span> Geel</a></dd>
                    <dd><a href="?filter=paars"><span class="purple">oo</span> Paars</a></dd>
                    <dd><a href="?filter=oranje"><span class="orange">oo</span> Oranje</a></dd>
                    <dd><a href="?filter=grijs"><span class="gray">oo</span> Grijs</a></dd>
                    <dd><a href="?filter=bruin"><span class="brown">oo</span> Bruin</a></dd>
                    <dd><a href="?filter=zilver"><span class="silver">oo</span> Zilver</a></dd>
                    <dd><a href="?filter=roze"><span class="pink">oo</span> Roze</a></dd>
                    <dd><a href="?filter=transparant"><span class="transparant">oo</span> Transparant</a></dd>
                    <dd><a href="?filter=multicolor"><span class="multicolor">oo</span> Multicolor</a></dd>
                </dl>
                <dl>
                    <dt><strong>Bouwjaar</strong></dt>
                    <br>
                    <dd><a href="?filter=new">◄ Nieuwste</a></dd>
                    <dd><a href="?filter=old">◄ Oudste</a></dd>

                </dl>

            </ol>
        </div>
        <div class="search">
            <input type="text" name="search" id="search">

        </div>
        <div class="content">
            <?php
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="car"><img src="images/cars/' . $row['image_url'] . '">
                <p class="naam" ><a class="link" href="info.php?id=' . $row['id'] . '">' . $row['type'] . " " . $row['model'] . '</a> <~ Meer Info </p>
                <p class="prijs" >€ ' . $row['price'] . ',-' . '</p>
            </div>';
            }
            ?>
        </div>
    </div>


    <script src="JS/script.js"></script>

</body>

</html>