<?php

namespace app\controllers;

use app\bd\Banco;
use PDO;

class UserActionController
{
    /**
     * Summary of decision
     * Responsavel pela tomada de decisao para chamar a acao e view correspondente
     * @param mixed $params
     * @return void
     */
    public function decision($params)
    {
        if(isset($params))
        {
            switch($params->action)
            {
                case 'edit':
                    $this->editUser($params);
                    break;
                case 'delete':
                    $this->deleteUser($params->id);
                    break;
                default:
                    echo "Deu pau!";
            }
        }
    }

    /**
     * Summary of editUser
     * Chamar view para renderização e editar o usuário
     * @return void
     */
    public function editUser($params)
    {
        $user = $this->getUserById($params->id);
        return Controller::view("edituser", ["user" => $user]);

    }

    /**
     * Summary of deleteUser
     * Chamar view para renderização para deletar o usuário
     * @return void
     */
    private function deleteUser($id)
    {
        $stm = Banco::getInstancia();
        $conn = $stm->getConexao();
        $sql = $conn->prepare("DELETE FROM usuarios WHERE id = :ID");
        $sql->bindParam(':ID', $id, PDO::PARAM_INT);
        $sql->execute();

        echo "<script>alert('Usuário deletado com sucesso!');window.location.href = '/list'</script>";
    }

    /**
     * Summary of getUserById
     * @param mixed $id
     * @return object
     */
    public function getUserById($id)
    {
        $stm = Banco::getInstancia();
        $conn = $stm->getConexao();
        $sql = $conn->prepare("SELECT * FROM usuarios WHERE id = :ID");
        $sql->bindParam(':ID', $id, PDO::PARAM_INT);
        
        $sql->execute();

        return $sql->fetchObject();
    }

    /**
     * Summary of update
     * @return void
     */
    public function update($user)
    {
        $nome = $user->nome;
        $id = $user->id;
        $email = $user->email;

        $stm = Banco::getInstancia();
        $conn = $stm->getConexao();
        $sql = $conn->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE ID = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        
        $sql->execute();
        echo "<script>alert('Usuario atualizado com sucesso!');window.location.href = '/';</script>";
    }
}


?>