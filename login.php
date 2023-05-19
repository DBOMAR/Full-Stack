<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
	.gebruikersnaam {
		width: 400px;
		height: 400px;
		background-color: #fff;
		padding: 50px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
		border-radius: 10px;
	}

	.gebruikersnaam h1 {
		font-family: Arial, sans-serif;
		font-size: 36px;
		color: #000;
		text-align: center;
		margin-bottom: 50px;
	}

	.gebruikersnaam label {
		position: absolute;
		left: 20px;
		top: 50%;
		transform: translateY(-50%);
		font-size: 24px;
		color: #000;
	}

	.gebruikersnaam input[type="text"],
	.gebruikersnaam input[type="wachtwoord"] {
		width: 100%;
		height: 50px;
		padding: 10px;
		font-size: 16px;
		border: none;
		background-color: #f5f5f5;
		margin-bottom: 25px;
	}

	.gebruikersnaam input[type="submit"] {
		width: 100%;
		height: 50px;
		background-color: #000;
		color: #fff;
		font-size: 20px;
		border: none;
		border-radius: 25px;
		cursor: pointer;
		transition: all 0.3s ease;
	}

	.gebruikersnaam input[type="submit"]:hover {
		background-color: #fff;
		color: #000;
	}
</style>

<body>
	<div class="gebruikersnaam">
		<h1>Inloggen</h1>

		<form action="loginConfirm.php" method="post">
			<label for="gebruikersnaam">
				<i class="fas fa-gebruikersnaam"></i>
			</label>
			<input type="text" name="gebruikersnaam" placeholder="gebruikersnaam" required>
			<label for="wachtwoord">
				<i class="fas fa-lock"></i>
			</label>
			<input type="wachtwoord" name="wachtwoord" placeholder="wachtwoord" required>
			<input type="submit" name="knop">

		</form>
		<!-- <p><a href="index.php">index</a></p>
		<p><a href="admin.php">admingedeelte</a></p> -->
		<!-- <p><a href="login.php?loguit">uitloggen</a></p> -->
	</div>
</body>

</html>
<?php
session_start();
if (isset($_GET["loguit"])) {
	$_SESSION = array();
	session_destroy();
	header('Location: login.php');
}
?>
<!-- // $options = [
//     'cost' => 12,
// ];

// echo password_hash("P1234", PASSWORD_DEFAULT, $options);

// echo password_verify("P1234", '$2y$12$njGeDj39sUpTPPbaQk8qCOUKFHD.zo6RshYafh/p8BYF4Sc9e1fKC') -->