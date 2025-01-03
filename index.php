<?php
require_once 'vendor/autoload.php';

use Crud\Classes\Banco;

// Conecta no banco
$banco = Banco::getInstancia();

require 'Rotas.php';


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD APP</title>
</head>
<body>
    <nav>
        <a href="#">Home</a>
        <a href="#">Cadastrar</a>
        <a href="#">Listar</a>
    </nav>
</body>
</html>