<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aeronaves</title>
</head>
<body>
    <form action="./process.php" method="post">
        <input type="text" name="model" placeholder="Modelo">
        <input type="text" name="status" placeholder="Condição">
        <input type="text" name="seats" placeholder="Quantidade de Assentos">
        <input type="text" name="location" placeholder="Localização">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>