<?php
require_once('./database.php');
session_start();
if (isset($_SESSION["gebruikersnaam"]) && $_SESSION["gebruikersnaam"]["rol"] == "Administrator") {
  // echo "<h1>Welkom " . $_SESSION["gebruikersnaam"]["naam"] . " op de website</h1>";
  // echo "<p><a href='login.php'>login</a></p>";
} else {
  header('Location: error.php');
  // terug naar inlogscherm

  //   die;
}
// if (isset($_GET["loguit"])) {
//   $_SESSION = array();
//   session_destroy();
// }
// print_r($_SESSION);
?>
<!DOCTYPE html>
<title>Registreren Pagina</title>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body{
  background: #959291;
  min-height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
}

.dropdown {
  display: inline-block;
  position: relative;
}

button{
  border:none;
  border-radius:5px;
  padding:15px 30px;
  font-size:18px;
  cursor:pointer;
}

button:hover{
  background-color:#D13C1D;
}

.dropdown-options {
  display: none;
  position: absolute;
  overflow: auto;
  background-color:#fff;
  border-radius:5px;
  box-shadow: 0px 10px 10px 0px rgba(0,0,0,0.4);
}

.dropdown:hover .dropdown-options {
  display: block;
}

.dropdown-options a {
  display: block;
  color: #D13C1D;
  padding: 5px;
  text-decoration: none;
  padding:20px 40px;
}

.dropdown-options a:hover {
  color: #0a0a23;
  background-color: #D13C1D;
  border-radius:5px;
}
  </style>
  <body>
  <div class="dropdown">
  <button>Maak een keuze</button>
  <div class="dropdown-options">
  <a href="opleiding.php">Opleiding Toevoegen</a>
      <a href="student.php">Student Toevoegen</a>
      <a href="student_opleiding.php">Student koppelen aan opleiding</a>
      <a href="info.php">Studenten Informatie</a>
      <a href="gebruikers.php">Gebruikers Toevoegen</a>
      <a href="login.php?loguit">Uitloggen</a>
  </div>
</div>
  </body>
  <!-- <style>
    body .dropbtn {
      background-color: #D13C1D;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;

    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: #3e8e41;
    }
  </style>
</head>

<body>

  <h2>Registreren Pagina</h2>
  <p>Hierbij kan je stundent, Opleiding tovoegen en opleiding koppelen aan een student.</p>

  <div class="dropdown">
    <button class="dropbtn">Maak een keuze</button>
    <div class="dropdown-content">
      <a href="opleiding.php">Opleiding Toevoegen</a>
      <a href="student.php">Student Toevoegen</a>
      <a href="student_opleiding.php">Student koppelen aan opleiding</a>
      <a href="info.php">Studenten Informatie</a>
      <a href="gebruikers.php">Gebruikers Toevoegen</a>

    </div>
  </div>

</body>

</html> -->
</html>