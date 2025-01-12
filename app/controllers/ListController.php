<?php

namespace app\controllers;

use app\bd\Banco;

class ListController
{
    public function listar($params)
    {
        // Listagem padrao
        if(!isset($params->userSearch))
        {
            $stm = Banco::getInstancia();
            $conn = $stm->getConexao();
            $sql = $conn->prepare("SELECT * FROM usuarios");
            $sql->execute();

            $usuarios = $sql->fetchAll();
        }
        else
        {
            // Listagem em relação a busca pelo usuario
            $stm = Banco::getInstancia();
            $conn = $stm->getConexao();
            $sql = $conn->prepare("SELECT * FROM usuarios WHERE nome LIKE '%$params->userSearch%' OR email LIKE '%$params->userSearch%'");
            $sql->execute();

            $usuarios = $sql->fetchAll();
        }
        
        return Controller::view("list", ["usuarios" => $usuarios]);
    }
}

?>