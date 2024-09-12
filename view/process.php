<?php
session_start();
require_once "../controller/Controller.php";
$controller = new Controller();

if(!empty($_POST['model']) && !empty($_POST['status']) && 
   !empty($_POST['seats']) && !empty($_POST['location'])){
    $model = $_POST['model'];
    $status = $_POST['status'];
    $seats = $_POST['seats'];
    $location = $_POST['location'];
    

    $controller->registerAircraft($model, $status, $seats, $location);

    header("location: ./index.php");
    die();
}

if(!empty($_POST['search'])){
    $search = $_POST['search'];

    $elements = $controller->getFilteredAircrafts($search);

    $_SESSION[$elements];

    header("Location: ./index.php");
    die();
}
?>