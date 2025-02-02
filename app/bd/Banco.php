<?php

namespace app\bd;
use PDO;

class Banco
{
    private static $instancia = null;
    private $conexao;
    
    private $host = 'localhost';
    private $username = 'root';
    private $name_bd = 'crud-app';
    private $pass = '';


    private function __construct()
    {
        try
        {
            $this->conexao = new PDO("mysql:host={$this->host};dbname={$this->name_bd}", $this->username, $this->pass);
            
            // Modo de erro do para o BD
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e)
        {
            die ("Não fo possivel a conexao com o banco de dados! " . $e->getMessage());
        }
    }

    /**
     * Retorna o objeto da classe Banco ou o mesmo ja criado para a conexao do banco de dados
     */
    public static function getInstancia(): Banco
    {
        if(self::$instancia == null)
        {
            self::$instancia = new Banco();
        }

        return self::$instancia;
    }

    /**
     * Retorna a unica conexao realizada com o banco de dados
     */
    public function getConexao(): PDO
    {
        return $this->conexao;
    }
}

?>