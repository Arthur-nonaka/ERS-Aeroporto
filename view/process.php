<?php
require_once "../controller/Controller.php";

if(!empty($_POST['model']) && !empty($_POST['status']) && 
   !empty($_POST['seats']) && !empty($_POST['location'])){
    $model = $_POST['model'];
    $status = $_POST['status'];
    $seats = $_POST['seats'];
    $location = $_POST['location'];
    
    $controller = new Controller();

    $controller->registerAircraft($model, $status, $seats, $location);

    header("location: ./index.php");
    die();
}
?>