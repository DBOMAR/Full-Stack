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
			$stmt = $conn->prepare("INSERT INTO student (idStudent, Roepnaam, Voorletter, Tussenvoegels, Achternaam, email) 
			VALUES (:idStudent, :Roepnaam, :Voorletter, :Tussenvoegels, :Achternaam, :email)");
			$idStudent = $_POST['idStudent'];
			$Roepnaam = $_POST['Roepnaam'];
			$Voorletter = $_POST['Voorletter'];
			$Tussenvoegels = $_POST['Tussenvoegels'];
			$Achternaam = $_POST['Achternaam'];
			$email = $_POST['email'];
			$stmt->bindParam(':idStudent', $idStudent);
			$stmt->bindParam(':Roepnaam', $Roepnaam);
			$stmt->bindParam(':Voorletter', $Voorletter);
			$stmt->bindParam(':Tussenvoegels', $Tussenvoegels);
			$stmt->bindParam(':Achternaam', $Achternaam);
			$stmt->bindParam(':email', $email);
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
	<title>Student Toevoegen</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<!-- formulário de contacto utilizando html e css -->

	<div class="contact_form">

		<div class="formulario">
			<h1>Student Toevoegen</h1>



			<form action="student.php" method="post">


				<p>
					<label for="nome" class="colocar_nome">Student code

					</label>
					<input type="text" placeholder="idStudent" name="idStudent" required>
				</p>

				<p>
					<label for="email" class="colocar_email">Roepnaam

					</label>
					<input type="text" placeholder="Roepnaam" name="Roepnaam" required>

				<p>
					<label for="telefone" class="colocar_telefone">Voorletter
					</label>
					<input type="text" placeholder="Voorletter" name="Voorletter" required>
				</p>

				<p>
					<label for="website" class="colocar_website">Tussenvoegels
					</label>
					<input type="text" placeholder="Tussenvoegels" name="Tussenvoegels" required>
				</p>

				<p>
					<label for="assunto" class="colocar_asunto">Achternaam
					</label>
					<input type="text" placeholder="Achternaam" name="Achternaam" required>
				</p>

				<p>
					<label for="assunto" class="colocar_asunto">E-mail
					</label>
					<input type="text" placeholder="email" name="email" required>
				</p>

				<button type="submit" class="button button--add" name="button" value="geklikt">VOEG TOE!</button>


			</form>
		</div>
	</div>

</body>

</html>