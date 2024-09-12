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
            <input type="text" name="model" placeholder="Modelo">
            <input type="text" name="status" placeholder="Condição">
            <input type="text" name="seats" placeholder="Quantidade de Assentos">
            <input type="text" name="location" placeholder="Localização">
            <input type="submit" value="Cadastrar">
        </form>
    </div>
    <table>
        <thead>
            <td>Codigo</td>
            <td>Modelo</td>
            <td>Condicao</td>
            <td>Quantidade</td>
            <td>Localização</td>
        </thead>
        <tbody>
            <?php 
        require_once "../controller/Controller.php";
        
        $controller = new Controller();
        
        Echo $controller->getFilteredAircrafts();
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