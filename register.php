<?php

require __DIR__.'./vendor/autoload.php';

define('TITLE','Cadastrar vaga');
use \App\Entity\Vaga;

$obVaga = new Vaga();
// validação post
if(isset($_POST['title'], $_POST['description'], $_POST['status'])){
    $obVaga->title = $_POST['title'];
    $obVaga->description = $_POST['description'];
    $obVaga->status = $_POST['status'];

    $obVaga->register();
    header("Location: index.php?status=success");exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/form.php';
include __DIR__.'/includes/footer.php';

