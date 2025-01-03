<?php

namespace Crud\Classes;

use PDO;
use PDOException;

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
        }catch(PDOException $e)
        {
            die("Erro na conexao com o banco de dados!" . $e->getMessage());
        }
    }

    /**
     * Summary of getInstancia
     * Responsavel por retornar uma unica instancia apenas existente em todo projeto
     * @return \Crud\Classes\Banco
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
     * Summary of getConexao
     * Responsavel por retornar o objeto que contem o resultado da conexao com o banco de dados
     * @return \PDO
     */
    public function getConexao(): PDO
    {
        return $this->conexao;
    }
}

?>