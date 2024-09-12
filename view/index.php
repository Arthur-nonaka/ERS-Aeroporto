<?php 
    session_start();

    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Cadastro de Aeronaves</title>
</head>
<body>
    <div class="main">

    <div>
        <form action="./process.php" method="post">
            <input type="text" name="id" placeholder="Codigo" value="<?php Echo $_SESSION['id']?>">
            <input type="text" name="model" placeholder="Modelo"value="<?php Echo $_SESSION['model']?>">
            <input type="text" name="status" placeholder="Condição"value="<?php Echo $_SESSION['status']?>">
            <input type="text" name="seats" placeholder="Quantidade de Assentos"value="<?php Echo $_SESSION['seats']?>">
            <input type="text" name="location" placeholder="Localização"value="<?php Echo $_SESSION['location']?>">
            <input type="submit" value="Cadastrar">
        </form>
    </div>
    <div>
        <form action="./process.php" method="post">
            <input type="text" name="search">
            <input type="submit" value="Procurar">
        </form>
    </div>
    <table>
        <thead>
            <td>Codigo</td>
            <td>Modelo</td>
            <td>Condicao</td>
            <td>Quantidade</td>
            <td>Localização</td>
            <td>Deletar</td>
        </thead>
        <tbody>
            <?php

            if($_SESSION['elements'] != ""){
                echo $_SESSION['elements'];
            } else {
                require_once "../controller/Controller.php";
                
                $controller = new Controller();
                
                Echo $controller->getAircrafts();
            }
        ?>
        </tbody>
    </table>
</div>
<footer>
    <ul>
        <li>Arthur Nonaka</li>
        <li>Caio Yudi</li>
        <li>Pedro Muraro</li>
        <li>Matheus Mendes</li>
</ul>
</footer>
</body>
</html>