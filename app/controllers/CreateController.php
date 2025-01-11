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

        // Ao inves de header, é usado o echo. Pois ao usar o header, todas as requisições feitas nao sao carregadas
        // o echo  dado antes ou depois é ignorado, sendo nao possivel a impressao nem execução do script.
        echo "<script>alert('Cadastro realizado com sucesso!');window.location.href = '/'</script>";
        exit;
    }
}


?>