<?php
require 'config.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($name && $email){
    //verificando se o email já está cadastrado
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue('email', $email);
    $sql->execute();

    if($sql->rowCount() ===0){
        //preparando montagem da query
        $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->execute();//executando montagem
        header("location: index.php");
        exit;
    }else{
        header("location: adicionar.php");
        exit;
    }
    
}else{
    header("location: adicionar.php");
    exit;
}