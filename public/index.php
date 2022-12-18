<?php

//AUTOLOAD
require __DIR__.'/../vendor/autoload.php';

use App\Entity\Vaga;

// BUSCA TODAS AS VAGAS NO BANCO DE DADOS
$vagas = Vaga::getVagas();

//INCLUDES DO PROJETO
include __DIR__.'/../includes/head.php';
include __DIR__.'/../includes/listagem.php';
include __DIR__.'/../includes/footer.php';