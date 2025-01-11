<?php

require_once '../vendor/autoload.php';
require '../routes/router.php';

use app\bd\Banco;

// Instancia da conexao com o BD
try
{
    $banco = Banco::getInstancia();
}catch(Exception $e)
{
    die("Erro ao conectar-se ao site!");
}

try
{
    $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
    $request = $_SERVER["REQUEST_METHOD"];
    
    // Caso nao exista a requisicao dentro do vetor, informo que a rota nao existe
    if(!isset($router[$request]))
    {   
        die(include '../app/controllers/views/404.php');
    }

    // Verifico se a chave do vetor existe ou nao
    if(!(array_key_exists($uri, $router[$request])))
    {
        die(include '../app/controllers/views/404.php');
    }

    $controller = $router[$request][$uri];
    $controller();

} catch(Exception $e)
{
    echo $e->getMessage();
}

?>