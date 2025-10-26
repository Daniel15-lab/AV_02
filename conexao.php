<?php
define("HOST","localhost");
define("USUARIO","root");
define("SENHA","");
define("DB","test_1");

//Criar a conexão usando MySQLi
$conexao = mysqli_connect("localhost", "root", "", "test_1") or die('Não foi possivel connectar');

?>
