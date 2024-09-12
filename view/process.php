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
    if(!empty($_POST['id'])){
        $id = $_POST['id'];

        $controller->editAircraft($id, $model, $status, $seats, $location);
    } else {
        $controller->registerAircraft($status, $model,$seats, $location);
    }
    header("location: ./index.php");
    die();
}

if(!empty($_POST['search'])){
    $search = $_POST['search'];

    $elements = $controller->getFilteredAircrafts($search);

    $_SESSION['elements'] = $elements;

    header("Location: ./index.php");
    die();
}else {
    $_SESSION['elements'] = "";
}

if(!empty($_GET['id']) && $_GET['type'] == "delete"){
    $id = $_GET['id'];

    $controller->deleteAircraft($id);

    header("Location: ./index.php");
    die();
}

if(!empty($_GET['id']) && $_GET['type'] == "edit"){
    $_SESSION['id'] = $_GET['id'];
}

header("Location: ./index.php");
?>