<?php
require_once("./database.php");

$id = $_GET['id'];
$sql = "delete from student_opleiding WHERE idStudent = $id";
$stmt = $conn->query($sql);

if ($stmt) {
    header('location:AfterD.php');
} else {
    die;
}

?>