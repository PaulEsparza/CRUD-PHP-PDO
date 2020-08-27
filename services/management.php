<?php
include('../database/conection.php');

if(isset($_POST['saveTask'])){
    $responsable = $_POST['responsable'];
    $description = $_POST['description'];
    $query = "INSERT INTO $table (responsable, description) VALUES (?, ?);";
    $ps = $conection->prepare($query);
    $res = $ps->execute([$responsable, $description]);
    if(!$res){
        die("error");
    }

    $_SESSION['message'] = "Task saved succesfully";
    $_SESSION['message_type'] = "success";

    header("Location:../index.php");
}

?>