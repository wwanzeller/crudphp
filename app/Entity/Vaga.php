<?php

namespace App\Entity;

//DEPENDENCIAS DA CLASSE
use \App\DB\Database;

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
    public function cadastrar() : bool
    {
        //DEFINIR DATA

        $this->data = date('Y-m-d H:i:s');

        //INSERIR VAGA NO BANCO
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
                            'titulo'    => $this->titulo,
                            'descricao' => $this->descricao,
                            'ativo'     => $this->ativo,
                            'data'      => $this->data
                            ]);

        //RETORNAR SUCESSO
        return true;
       // echo "<pre>"; print_r($this); "</pre>"; exit;
    
    }
    
}