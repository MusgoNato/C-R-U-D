<?php

function load(string $controller, string $method)
{    
    try
    {
        $controllerNamespace = "app\\controllers\\{$controller}";
        if(!class_exists($controllerNamespace))
        {
            throw new Exception("O controller {$controller} não existe");
        }
        
        $controllerInstance = new $controllerNamespace();

        if(!method_exists($controllerInstance, $method))
        {
            throw new Exception("O metodo {$method} nao existe no controller {$controller}");
        }

        // Transformo em um objeto qualquer requisição que foi feita, sendo POST ou GET
        $controllerInstance->$method((object)$_REQUEST);
    } catch(Exception $e)
    {
        echo $e->getMessage();
    }
    
}

// Base de rotas
$router = 
[
    "GET" =>
    [
        "/" => fn() => load("HomeController", "index"),
        "/create" => fn() => load("CreateController", "index"),
        "/list" => fn() => load("ListController", "listar"),
    ],
    
    "POST" =>
    [
        "/create" => fn() => load("CreateController", "store"),
    ],
];

?>