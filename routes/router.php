<?php

function load(string $controller, string $action)
{    try
    {
        $controllerNamespace = "app\\controllers\\{$controller}";
        if(!class_exists($controllerNamespace))
        {
            throw new Exception("O controller {$controller} não existe");
        }
        
        $controllerInstance = new $controllerNamespace();

        if(!method_exists($controllerInstance, $action))
        {
            throw new Exception
            (
                "O metodo {$action} nao existe no controller {$controller}"
            );
        }

        // Transformo em um objeto qualquer requisição que foi feita, sendo POST ou GET
        $controllerInstance->$action((object)$_REQUEST);
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
    ],
    
    "POST" =>
    [
        "/create" => fn() => load("CreateController", "store"),
    ],
];

?>