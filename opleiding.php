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
			$stmt = $conn->prepare("INSERT INTO opleiding (idOpleiding, opleiding_naam, opleiding_niveau) 
			VALUES (:idOpleiding, :opleiding_naam, :opleiding_niveau)");
			$idOpleiding = $_POST['idOpleiding'];
			$opleiding_naam = $_POST['opleiding_naam'];
			$opleiding_niveau = $_POST['opleiding_niveau'];
			$stmt->bindParam(':idOpleiding', $idOpleiding);
			$stmt->bindParam(':opleiding_naam', $opleiding_naam);
			$stmt->bindParam(':opleiding_niveau', $opleiding_niveau);
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
	<title>Opleiding Toevoegen</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<!-- formulário de contacto utilizando html e css -->

	<div class="contact_form">

		<div class="formulario">
			<h1>Opleiding Toevoegen</h1>



			<form action="opleiding.php" method="post">


				<p>
					<label for="nome" class="colocar_nome">Opleiding code

					</label>
					<input type="text" placeholder="idOpleiding" name="idOpleiding" required>
				</p>

				<p>
					<label for="email" class="colocar_email">Opleiding Naam

					</label>
					<input type="text" placeholder="opleiding naam" name="opleiding_naam" required>

				<p>
					<label for="telefone" class="colocar_telefone">Opleiding Niveau
					</label>
					<input type="text" placeholder=" opleiding niveau" name="opleiding_niveau" required>
				</p>


				<button type="submit" class="button button--add" name="button" value="geklikt">VOEG TOE! </button>


			</form>
		</div>
	</div>

</body>

</html>