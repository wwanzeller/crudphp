<?php

//AUTOLOAD
require __DIR__.'/../vendor/autoload.php';

use App\Entity\Vaga;

$vagas = Vaga::getVagas();

//INCLUDES DO PROJETO
include __DIR__.'/../includes/head.php';
include __DIR__.'/../includes/listagem.php';
include __DIR__.'/../includes/footer.php';