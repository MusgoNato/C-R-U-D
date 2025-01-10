<?php

namespace app\controllers;

use League\Plates\Engine;
use Exception;

class Controller
{
    public static function view(string $view, array $data = [])
    {
        // Passo aonde esta o arquivo atual e volto 2 niveis, concatenando com a pasta views
        $viewsPath = dirname(__FILE__, 1) . "/views";
        
        if(!file_exists($viewsPath.DIRECTORY_SEPARATOR.$view . ".php"))
        {
            throw new Exception("A view {$view} não existe!");
        }
        
        $templates = new Engine($viewsPath);
        
        // Renderizo o template, pois ja carreguei o caminho correto da view
        echo $templates->render($view, $data);
    }
}


?>