<?php

session_start();

if (isset($_SESSION['loggedInUser'])) {
    header("Location: ../index.php");
    exit();
}

$db_host = 'localhost';
$db_user = 'bit_academy';
$db_pass = 'bit_academy';
$db_name = 'wheelsOfFortune';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    exit("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['loggedInUser'] = $row['username'];
        header("Location: ../index.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="login.css">
    <title>Log In</title>
</head>

<body>
    <div id="box">
        <h1>Login</h1>
        <?php if (isset($error)) : ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input id="text" type="text" name="username" required>
            <br>
            <br>
            <label for="password">Password:</label>
            <input id="text" type="password" name="password" required>

            <br><br>

            <button id="button" type="submit">LOG IN</button>
            <br>
            <p id="center"><strong>nog geen account?</strong> <a href="../signup/signup.php">signup</a></p>

        </form>
    </div>
</body>

</html>