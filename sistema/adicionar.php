<?php
    include 'conexao.php';
    $nome = $_POST['txtNome'];
    $email = $_POST['txtEmail'];
    $data = $_POST['txtData'];
    
   #$partes = explode('-', $data);
    #$data_americana = $partes[2]. "/".$partes[1]."/".$partes[0];

    $sql = $pdo->prepare("INSERT INTO aluno (nome, email, data_nascimento)
    VALUES (?, ?, ?)"); 

    $sql->execute([$nome, $email, $data]);

    header("Location: index.php");
    exit;
?>