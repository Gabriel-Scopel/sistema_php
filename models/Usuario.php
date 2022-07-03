<?php
class Usuario{
    private $id;
    private $nome;
    private $email;

    public function getId(){
        return $this->id;
    }
    public function setId($i){
        $this->id = trim($i); //trim retira possiveis espaços que podemos receber
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($n){
        $this->nome = ucwords(trim($n)); //colocando a primeira letra do nome do usuário em maiúsculo
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($e){
        $this->email = strtolower(trim($e));
    }
}

interface UsuarioDAO{
    public function add(Usuario $u);
    public function findAll();
    public function findById($id);
    public function fingByEmail($email);
    public function update(Usuario $u);
    public function delete($id);
}