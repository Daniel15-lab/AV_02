<?php
session_start();
require 'conexao.php';

if (isset($_POST['create_usuario'])) {

    // Obtem os dados do formulário
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = isset($_POST['senha']) ? mysqli_real_escape_string($conexao,trim($_POST['senha'])):''; 
 
    mysqli_query($conexao,  $sql);
}
?>
