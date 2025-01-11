<?php

namespace app\controllers;

use app\bd\Banco;
use PDO;

class ListController
{
    public function listar()
    {
        $stm = Banco::getInstancia();
        $conn = $stm->getConexao();
        $sql = $conn->prepare("SELECT * FROM usuarios");
        $sql->execute();

        $usuarios = $sql->fetchAll();
        return Controller::view("list", ["usuarios" => $usuarios]);
    }
}

?>