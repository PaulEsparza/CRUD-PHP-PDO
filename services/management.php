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

if(isset($_POST['deleteTask'])){
    $id = $_GET['id'];
    $query = "DELETE FROM $table WHERE id = ?";
    $ps = $conection->prepare(($query));
    $res = $ps->execute([$id]);
    if($res == 0){
        die("error");
    }

    $_SESSION['message'] = "Task removed succesfully";
    $_SESSION['message_type'] = "warning";

    header("Location:../index.php");
}

?>