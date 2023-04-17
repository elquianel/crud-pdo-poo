<?php

require __DIR__.'./vendor/autoload.php';

define('TITLE','Editar vaga');
use \App\Entity\Vaga;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('Location: index.php?status=error');exit;
}

$obVaga = Vaga::getVaga($_GET['id']);
if(!$obVaga instanceof Vaga){
    header('Location: index.php?status=error');exit;
}

// validação post
if(isset($_POST['title'], $_POST['description'], $_POST['status'])){
    $obVaga->title = $_POST['title'];
    $obVaga->description = $_POST['description'];
    $obVaga->status = $_POST['status'];
    echo "<pre>";var_dump($obVaga);
    $obVaga->edit();
    header("Location: index.php?status=success");exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/form.php';
include __DIR__.'/includes/footer.php';

