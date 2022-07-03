<?php
require 'config.php';


$id = filter_input(INPUT_GET, 'id');
if($id){
    $usuarioDao->delete($id);
   
}

header("location: index.php");
exit;
