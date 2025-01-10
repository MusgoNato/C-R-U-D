<?php

namespace app\controllers;
use app\bd\Banco;

class CreateController
{
    // Apresentação de view
    public function index()
    {
        return Controller::view("create");
    }

    // Armazenamento das informações do usuario
    public function store($params)
    {
        $newUser = $params->nome;
        $newUserEmail = $params->email;

        $conexao = Banco::getInstancia();
        $sttm = $conexao->getConexao();
        $sql = $sttm->prepare("INSERT INTO usuarios (nome, email) VALUES('{$newUser}', '{$newUserEmail}')");
        $sql->execute();


        header("Location: /");
        exit;
    }

}



?>