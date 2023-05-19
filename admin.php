<?php
session_start();
if (isset($_SESSION["gebruikersnaam"]) && $_SESSION["gebruikersnaam"]["rol"] == "Administrator") {
    echo "<h1>Welkom " . $_SESSION["gebruikersnaam"]["naam"] . " op het admingedeelte van de website</h1>";
    echo "<p><a href='login.php'>login</a></p>";
} else {
    header('Location: error.php');
    // terug naar inlogscherm
}
?>