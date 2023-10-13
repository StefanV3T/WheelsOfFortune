<?php
session_start();

$servername = "localhost";
$username = "bit_academy";
$password = "bit_academy";
$dbname = "wheelsOfFortune";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}


$error = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (!empty($_POST['password']) && !empty($_POST['username'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

		mysqli_query($con, $query);

		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($con, $sql);

		$row = mysqli_fetch_assoc($result);
		$_SESSION['loggedInUser'] = $row['username'];

		header("Location: ../index.php");
	} else {
		$error = "Vul een geldig gebruikersnaam en/of wachtwoord in.";
	}
}

?>


<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="signup.css">
	<title>Sign up</title>
</head>

<body>
	<div id="box">

		<form method="post">
			<div>
				<h1>Registreren</h1>
				<label for="username">Gebruikersnaam: </label><br>
				<input id="text" type="text" name="username"><br><br>
				<label for="password">Wachtwoord: </label>
				<input id="text" type="password" name="password"><br><br>
				<input id="button" type="submit" value="REGISTREER"><br>
				<p id="error"><strong><?php echo $error ?></strong></p>
				<p id="center"><strong>heb je al een account?</strong> <a href="../login/login.php">Login</a></p>

		</form>
	</div>
	</div>
</body>

</html>