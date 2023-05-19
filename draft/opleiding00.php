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
    $sql = "INSERT INTO opleiding VALUES ('" . $_POST['opleidingscode'] . "', '" . $_POST['naam_opleiding'] . "', '" . $_POST['niveau_opleiding'] . "');";
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
            <form action="opleiding.php" method="post">
                <input type="text" placeholder="opleidingscode" name="opleidingscode" required>
                <input type="text" placeholder="naam opleiding" name="naam opleiding" required>
                <input type="text" placeholder=" niveau opleiding" name="niveau opleiding" required>
                <button type="submit" class="button button--add" name="button" value="geklikt">VOEG TOE!</button>
            </form>
        </div>
    </body>
</html>
