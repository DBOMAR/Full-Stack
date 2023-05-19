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
    $sql = "INSERT INTO student_opleiding VALUES ('" . $_POST['idStudent'] . "', '" . $_POST['Opleidingcode'] . "', '" . $_POST['Start_datum'] . "', '" . $_POST['Eind_datum'] . "', '" . $_POST['Diploma_Ja_/_Nee'] . "');";
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
            <form action="student_opleiding.php" method="post">
                <input type="text" placeholder="idStudent" name="idStudent" required>
                <input type="text" placeholder="Opleidingcode" name="Opleidingcode" required>
                <input type="text" placeholder="Start datum" name="Start datum" required>
                <input type="text" placeholder="Eind datum" name="Eind datum" required>
                <input type="text" placeholder="Diploma Ja / Nee" name="Diploma Ja / Nee" required>
                <button type="submit" class="button button--add" name="button" value="geklikt">VOEG TOE!</button>
            </form>
        </div>
    </body>
</html>
