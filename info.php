<?php
require_once('./database.php');
session_start();

// Controleer of de gebruiker is ingelogd
if (isset($_SESSION["gebruikersnaam"])) {
  $gebruikersnaam = $_SESSION["gebruikersnaam"]["naam"];
} else {
  header("Location: error.php");
  exit;
}


/* 1. OPHALEN OPLEIDINGEN */
$opleidingen = $conn->query("SELECT idOpleiding, `opleiding_naam`  FROM opleiding")->fetchAll(PDO::FETCH_ASSOC);
/* 2. OPHALEN STUDENTEN PER OPLEIDING (AFHANKELIJK VAN DE GEKOZEN OPLEIDING)*/
// JSC($_POST);
if (isset($_POST['submit'])) {
  if ($_POST['idOpleiding'] === 'all') {
    $query = "SELECT s.idStudent, s.roepnaam, s.achternaam, s.email, so.start_datum, so.eind_datum, so.diploma FROM student s INNER JOIN 
    student_opleiding so ON s.idStudent = so.idStudent";
  } else {
    $query = "SELECT s.idStudent, s.roepnaam, s.achternaam, s.email, so.start_datum, so.eind_datum, so.diploma FROM student s INNER JOIN 
    student_opleiding so ON s.idStudent = so.idStudent WHERE so.idOpleiding = '" . $_POST['idOpleiding'] . "'";
  }

  $result = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
}



function JSC($input)
{
  echo "<pre>";
  print_r($input);
  echo "</pre>";
}
?>
<html>
<title>Studenten Informatie</title>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background: #959291;
    }

    .table {
      width: 100%;
    }

    a {
      color: black;
    }

    .table,
    tr,
    td,
    th {
      border: black solid 2px;
    }
  </style>
</head>

<body>
  <h2>Opleidingen informatie</h2>
  <form method="post" action="./info.php">
    <select name="idOpleiding" id="idOpleiding">
      <option value="all">Allemaal</option>
      <?php
      foreach ($opleidingen as $opleiding) {
        $idOpleiding = $opleiding['idOpleiding'];
        $opleidingNaam = $opleiding['opleiding_naam'];
        echo "<option value='$idOpleiding'>$opleidingNaam</option>";
      }
      ?>
    </select>
    <button class="button button--submit" value="true" name="submit">KIES!</button>
  </form>
  <div class="container container--result">
    <?php
    if (isset($result)) {
      echo "<table class='table'>";
      echo "<tr>
              <th>idStudent</th>
              <th>Roepnaam</th>
              <th>Achternaam</th>
              <th>Email</th>
              <th>Startdatum</th>
              <th>Einddatum</th>
              <th>Diploma</th>
              <th>Delete</th>
            </tr>";
      foreach ($result as $student) {
        echo "<tr>
                <td>{$student['idStudent']}</td>
                <td>{$student['roepnaam']}</td>
                <td>{$student['achternaam']}</td>
                <td>{$student['email']}</td>
                <td>{$student['start_datum']}</td>
                <td>{$student['eind_datum']}</td>
                <td>{$student['diploma']}</td>
                <td><a style='text-decoration: none' href='remove.php?id={$student['idStudent']}'>verwijderen</a></td>
              </tr>";
      }
      echo "</table>";
    }
    ?>
  </div>
</body>

</html>