<?php
session_start();
require 'conexao.php';
if(isset($_POST['create_usuario'])){
    $nome = mysqli_real_scape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_scape_string($conexao, trim($_POST['email']));
    $senha = isset($_POST['senha']) ? mysqli_real_scape_string($conexao, password_hash(trim($_POST['senha']), PASSWORD_DEFAULT)):   '';

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES('$nome', '$email', '$senha')";
    mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['mensagem'] = 'usuário criado com sucesso';
        header('Location: index.php');
        exit;
    } else{
        $_SESSION['mensagem'] = 'usuário não foi criado';
        header('Location: index.php');
        exit;
    }
}
if(isset($_POST['update_usuario'])){
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario_id']);

    $nome = mysqli_real_scape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_scape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_scape_string( $conexao, trim($_POST['senha']));

    $sql = "UPDATE  usuarios SET nome ='$nome', email = '$email'";
    if(!empty($senha)){
        $sql .=", senha='". password_hash($senha, PASSWORD_DEFAULT) . "'";
    }
        $sql .= " WHERE ID = $usuario_id";

    mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['mensagem'] = 'usuário Atualizado com sucesso';
        header('Location: index.php');
        exit;
    } else{
        $_SESSION['mensagem'] = 'usuário não foi Atualizado';
        header('Location: index.php');
        exit;
    }
}
if(isset($_POST['delete_usuario'])){
    $usuario = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);
    
    $sql = "DELETE FROM usuario WHERE id = '$usuario_id'";
    
    mysqli_query($conexao, $sql);
    
    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['message'] = "Usuário  deletado com sucesso";
        header('location: index.php');
        exit;
    } else{
        $_SESSION['message'] = "Usuário não foi deletado ";
        header('location: index.php');
        exit;
    }
}
?>