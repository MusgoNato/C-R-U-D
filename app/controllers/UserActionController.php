<?php

namespace app\controllers;

use app\bd\Banco;

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
    private function editUser($params)
    {
        // $stm = Banco::getInstancia();
        // $conn = $stm->getConexao();
        // $sql = $conn->prepare("SELECT * FROM usuarios WHERE id=" . $params->id);
        // $sql->execute();

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
        $sql = $conn->prepare("DELETE FROM usuarios WHERE id=" . $id);
        $sql->execute();

        echo "<script>alert('Usuário deletado com sucesso!');window.location.href = '/list'</script>";
    }
}


?>