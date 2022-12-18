<?php

namespace App\Entity;

//DEPENDENCIAS DA CLASSE
use App\DB\Database;
use PDOStatement;
use PDO;

class Vaga {

    /**
     * Identificador único da vaga
     *
     * @var integer
     */
    public $id;

    /**
     * Título da vaga
     *
     * @var string
     */
    public $titulo;

    /**
     * Descrição da vaga (pode conter html)
     *
     * @var string
     */
    public $descricao;

    /**
     * Define se a vaga está ativa
     *
     * @var string(s/n)
     */
    public $ativo;

    /**
     * Data e hora que a vaga foi criada
     *
     * @var string
     */
    public $data;

    /**
     * Método resposável por cadastrar uma vaga
     *
     * @return boolean
     */
    public function registar() : bool
    {
        //DEFINIR DATA
        $this->data = date('Y-m-d H:i:s');

        //INSERIR VAGA NO BANCO
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->create([
                                            'titulo'    => $this->titulo,
                                            'descricao' => $this->descricao,
                                            'ativo'     => $this->ativo,
                                            'data'      => $this->data
                                        ]);

        //RETORNAR SUCESSO
        return true;       
    }

    /**
     * Método responsável por atualizar uma vaga
     *
     * @return boolean
     */
    public function atualizar(): bool
    {
        //ATUALIZADA A DATA
        $this->data = date('Y-m-d H:i:s');
        return (new Database('vagas'))->update('id = '.$this->id, [
                                                    'titulo'    => $this->titulo,
                                                    'descricao' => $this->descricao,
                                                    'ativo'     => $this->ativo,
                                                    'data'      => $this->data
                                                ]);
    }

    /**
     * Método responsável por obter vagas no banco de dados
     *
     * @param String|null $where
     * @param String|null $order
     * @param String|null $limit
     * @return PDOStatement
     */
    public static function getVagas(String $where = null, String $order = null, String $limit = null) : array
    {
        return (new Database('vagas'))->read($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por consulta uma vaga
     *
     * @param integer $id
     * @return Vaga
     */
    public static function getVaga(Int $id)
    {
        return (new Database('vagas'))->read('id='.$id)
                                      ->fetchObject(self::class);
    }

    /**
     * Método responsável por excluir uma vaga
     *
     * @return boolean
     */
    public function excluir(): bool
    {
        return (new Database('vagas'))->delete('id = '.$this->id);
    }
    
}