<?php
require_once('./database.php');
session_start();
echo $_POST['knop'];
if (!isset($_POST['knop'])) {
	header('Location: login.php');
	exit();
}
// variable maken van de input
$gebruikersnaam = $_POST['gebruikersnaam'];
$wachtwoord = $_POST['wachtwoord'];
// data ophalen van DB
$query = "SELECT gebruikersnaam, wachtwoord, rol FROM gebruikers WHERE gebruikersnaam='$gebruikersnaam' AND wachtwoord='$wachtwoord'";
// connectie maken 
$stmt = $conn->query($query);
// resultaat
$resultaat = $stmt->fetch();

//echo $resultaat['gebruikersnaam'];

if ($gebruikersnaam == $resultaat['gebruikersnaam'] && $wachtwoord == $resultaat['wachtwoord']) {
	// wachtwoord controol
	$_SESSION["gebruikersnaam"] = array(
		"naam" => $resultaat["gebruikersnaam"],
		"wachtwoord" => $resultaat['wachtwoord'],
		"rol" => $resultaat['rol']
	);
	header('Location: index.php');
	exit();
} else {
	header('Location: login.php?wrongpass');
}
;
header('Location: login.php');
?>