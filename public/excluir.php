<?php

//AUTOLOAD
require __DIR__.'/../vendor/autoload.php';

//DEPENDÊNCIAS DO PROJETO
use App\Entity\Vaga;

// VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

// CONSULTA A VAGA
$obVaga = Vaga::getVaga($_GET['id']);

//VALIDAÇÃO DA VAGA
if (!$obVaga instanceof Vaga) {
    header('location: index.php?status=error');
    exit;
}

//echo "<pre>"; print_r($obVaga); "</pre>"; exit;

//VALIDAÇÃO E INSERÇÃO DE UMA VAGA
if(isset($_POST['excluir'])){
    $obVaga->excluir();

    //RETORNA PARA PÁGINA PRINCIPAL COM MENSAGEM DE SUCESSO
    header('location: index.php?status=success');
    exit;
}

//INCLUDES DO PROJETOS
include __DIR__.'/../includes/head.php';
include __DIR__.'/../includes/confirmar-exclusao.php';
include __DIR__.'/../includes/footer.php';