<?php

require __DIR__.'./vendor/autoload.php';

use \App\Entity\Vaga;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('Location: index.php?status=error');exit;
}

$obVaga = Vaga::getVaga($_GET['id']);
if(!$obVaga instanceof Vaga){
    header('Location: index.php?status=error');exit;
}

// echo "<pre>";print_r($obVaga);exit;

// validação post
if(isset($_POST['delete'])){
    $obVaga->delete();
    header("Location: index.php?status=success");exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmed_delete.php';
include __DIR__.'/includes/footer.php';

