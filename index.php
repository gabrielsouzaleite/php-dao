<?php

require_once("config.php");

//consulta no banco
// $sql = new Sql();
// $usuarios = $sql->select("SELECT * FROM tb_usuarios");
// echo json_encode($usuarios);

//consulta de usuário por id
// $user = new usuario();
// $user->loadById(2);
// echo $user;

//consulta por lista
//$list = usuario::getList();
//echo json_encode($list);

//Procura usuário
//$search = usuario::search("R");
//echo json_encode($search);

//carrega um usuário pelo login e senha
//$usuario = new usuario();
//$usuario->login("gabriel","0505");
//echo $usuario;

//inserindo usuario
//$aluno = new usuario();
//$aluno->setDeslogin("Antonio");
//$aluno->setDessenha("@ntonio");
//$aluno->insert();
//echo $aluno;

//atualizando usuario
//$usuario = new usuario();
//$usuario->loadById(6);
//$usuario->update("Atena", "@tena");
//echo $usuario;

//Deletando usuario
$usuario = new usuario();
$usuario->loadById(5);
$usuario->delete();
echo $usuario;
?>