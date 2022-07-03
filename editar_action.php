<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($id && $name && $email){
  $usuario = $usuarioDao->findById($id);
  $usuario = new Usuario();
  $usuario->setId($id);
  $usuario->setNome($name);
  $usuario->setEmail($email);
  $usuarioDao->update($usuario);

  header("location: index.php");
  exit;
}else{
    header("location: adicionar.php?id=".$id);
    exit;
}