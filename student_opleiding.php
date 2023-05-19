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

		// if (!empty($idStudent)) {
		try {
			$stmt = $conn->prepare("INSERT INTO student_opleiding (idStudent, idOpleiding, start_datum, eind_datum, diploma) 
                VALUES (:idStudent, :idOpleiding, :start_datum, :eind_datum, :diploma)");
			$idStudent = $_POST['idStudent'];
			$idOpleiding = $_POST['idOpleiding'];
			$start_datum = $_POST['start_datum'];
			$eind_datum = $_POST['eind_datum'];
			$diploma = $_POST['diploma'];
			$stmt->bindParam(':idStudent', $idStudent);
			$stmt->bindParam(':idOpleiding', $idOpleiding);
			$stmt->bindParam(':start_datum', $start_datum);
			$stmt->bindParam(':eind_datum', $eind_datum);
			$stmt->bindParam(':diploma', $diploma);
			$stmt->execute();
			header('Location: dank.php');
			exit();
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
	// }
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
	<title>Student koppelen</title>
	<link rel="stylesheet" href="style.css">
</head>


<body>

	<!-- formulário de contacto utilizando html e css -->

	<div class="contact_form">

		<div class="formulario">
			<h1>Student Koppelen</h1>

			<form action="student_opleiding.php" method="post">


				<label for="telefone" class="colocar_telefone">Student code
				</label>
				<input type="text" placeholder="Student code" name="idStudent" required>


				<label for="telefone" class="colocar_telefone">Opleiding code
				</label>
				<input type="text" placeholder="Opleiding code" name="idOpleiding" required>


				<label for="telefone" class="colocar_telefone">Start datum
				</label>
				<input type="text" placeholder="Start datum" name="start_datum" required>


				<label for="website" class="colocar_website">Eind datum
				</label>
				<input type="text" placeholder="Eind datum" name="eind_datum" required>


				<label for="assunto" class="colocar_asunto">Diploma
				</label>
				<input type="text" placeholder="Diploma" name="diploma" required>




				<button type="submit" class="button button--add" name="button" value="geklikt">VOEG TOE!</button>


			</form>
		</div>
	</div>

</body>

</html>