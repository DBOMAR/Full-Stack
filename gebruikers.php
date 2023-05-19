<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	session_start();
	if (isset($_SESSION["gebruikersnaam"]) && $_SESSION["gebruikersnaam"]["rol"] == "Administrator") {
		// echo "<h1>Welkom " . $_SESSION["gebruikersnaam"]["naam"] . " op de website</h1>";
		// echo "<p><a href='login.php'>login</a></p>";
	} else {
		header('Location: error.php');
		// terug naar inlogscherm
	}

	if (isset($_POST['button']) && $_POST['button'] === 'geklikt') {
		try {
			$stmt = $conn->prepare("INSERT INTO gebruikers (gebruikersnaam, wachtwoord, rol) 
			VALUES (:gebruikersnaam, :wachtwoord, :rol)");
			$gebruikersnaam = $_POST['gebruikersnaam'];
			$wachtwoord = $_POST['wachtwoord'];
			$rol = $_POST['rol'];
			$stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
			$stmt->bindParam(':wachtwoord', $wachtwoord);
			$stmt->bindParam(':rol', $rol);
			$stmt->execute();
			header('Location: dank.php');
			exit();
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

function JSC($input)
{
	echo "<pre>";
	print_r($input);
	echo "</pre>";
}
?>


<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Gebruikers Toevoegen</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<!-- formulário de contacto utilizando html e css -->

	<div class="contact_form">

		<div class="formulario">
			<h1>Gebruikers Toevoegen</h1>



			<form action="gebruikers.php" method="post">


				<p>
					<label for="nome" class="colocar_nome">gebruikersnaam

					</label>
					<input type="text" placeholder="gebruikersnaam" name="gebruikersnaam" required>
				</p>

				<p>
					<label for="email" class="colocar_email">Wachtwoord

					</label>
					<input type="text" placeholder="wachtwoord" name="wachtwoord" required>

				<p>
					<label for="telefone" class="colocar_telefone">Rol
					</label>
					<input type="text" placeholder=" rol" name="rol" required>
				</p>


				<button type="submit" class="button button--add" name="button" value="geklikt">VOEG TOE! </button>


			</form>
		</div>
	</div>

</body>

</html>