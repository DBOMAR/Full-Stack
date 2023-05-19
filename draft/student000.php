<?php

require_once('./database.php');
JSC($conn);
//FRONTEND
//FORMULIER MAKEN WAAR JE DE GEGEVENS KAN INVULLEN
//CODE NAAM NIVEAU

//CLICK OP DE KNOP
//
//BACKEND
//DATA UIT VELDEN OPHAKEN

JSC($_POST);
if(isset($_POST['button']) && $_POST['button'] === 'geklikt'){
    //Kan DIT VEILIGER? JA => HOE (Prepared statemetns)
    //CHECK OP Primary Key? 
    $sql = "INSERT INTO student VALUES ('" . $_POST['idStudent'] . "', '" . $_POST['Roepnaam'] . "', '" . $_POST['Vooletter'] . "', '" . $_POST['Tussenvoegels'] . "', '" . $_POST['Achternaam'] . "', '" . $_POST['E-mail'] . "');";
    $conn->query($sql);
    //velden leegmaken
    //refreshen
    echo "<meta http-equiv='refresh' content='0'>";
}
//FRONTEND
//SUCCESMELDING

function JSC($input){
    echo "<pre>";
    print_r($input);
    echo "</pre>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            * {
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form action="student.php" method="post">
                <input type="text" placeholder="idStudent" name="idStudent" required>
                <input type="text" placeholder="Roepnaam" name="Roepnaam" required>
                <input type="text" placeholder="Vooletter" name="Vooletter" required>
                <input type="text" placeholder="Tussenvoegels" name="Tussenvoegels" required>
                <input type="text" placeholder="Achternaam" name="Achternaam" required>
                <input type="text" placeholder="E-mail" name="E-mail" required>
                <button type="submit" class="button button--add" name="button" value="geklikt">VOEG TOE!</button>
            </form>
        </div>
    </body>
</html>
