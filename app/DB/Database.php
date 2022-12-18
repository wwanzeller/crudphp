<?php

namespace App\DB;

//DEPENDENCIAS DO PROJETO
use PDO;
use PDOException;
use Throwable;

class Database {

    /**
     * Host de conexão com banco de dados
     * @var string
     */
    const HOST = 'mysql';

    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = 'php';

    /**
     * Usuário do banco de dados
     * @var string
     */
    const USER = 'root';

    /**
     * Senha do banco de dados
     * @var string
     */
    const PASS = 'root';

    /**
     * Nome da tabela a ser manipulada
     *
     * @var string
     */
    private $table;

    /**
     * Instância de conexçáo com o banco de dados
     *
     * @var pdo
     */
    private $connection;

    /**
     * Define a tabela e instancia a conexão
     *
     * @param string|null $table
     */
    public function __construct(string $table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método responsável por instanciar uma conexão com o banco de dados
     *
     * @return void
     */
    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Throwable | PDOException $e) {
            die('ERROR:' . $e->getMessage());
        }
    }

    /**
     * Método responsável por executar queries dentro do banco de dados
     *
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute(string $query, array $params = []) : \PDOStatement
    {
        try {
           $statement = $this->connection->prepare($query);
           $statement->execute($params);
           return $statement;

        } catch (Throwable | PDOException $e) {
            die('ERROR:' . $e->getMessage());
        }
    }

    /**
     * Método responsável por inserir dados no banco
     *
     * @param array $values [fiels => value]
     * @return integer ID Inserido
     */
    public function insert(array $values) : int
    {
        // DADOS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        // MONTA A QUERY
        $query = 'INSERT INTO ' . $this->table . ' ('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';

        // EXECUTA O INSERT
        $this->execute($query, array_values($values));
       
        return $this->connection->lastInsertId();
    }

}