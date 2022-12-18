<?php

//AUTOLOAD
require __DIR__.'/../vendor/autoload.php';

define('TITLE', 'Editar Vaga');

//DEPENDÊNCIAS DO PROJETO
use App\Entity\Vaga;

//INSTANCIA OBJETO VAGA
$obVaga = new Vaga;

//VALIDAÇÃO E INSERÇÃO DE UMA VAGA
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])){
    
    $obVaga->titulo    = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo     = $_POST['ativo'];

    $obVaga->registar();

    //RETORNA PARA PÁGINA PRINCIPAL COM MENSAGEM DE SUCESSO
    header('location: index.php?status=succes');
    exit;
}

//INCLUDES DO PROJETOS
include __DIR__.'/../includes/head.php';
include __DIR__.'/../includes/formulario.php';
include __DIR__.'/../includes/footer.php';