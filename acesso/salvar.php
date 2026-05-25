<?php

    // CONEXÃO COM O BANCO
    require_once "../config/database.php";

    // PEGAR DADOS
    $usuario = $_POST["usuario"] ?? "";
    $senha = $_POST["senha"] ?? "";
    $confirmar_senha = $_POST["confirmar_senha"] ?? "";

    // INVALIDAR CAMPOS VAZIOS
    if (empty($usuario) || empty($senha) || empty($confirmar_senha)){
        echo "Preencha os campos!";
        exit;
    };

    // INVALIDAR SENHAS DIFERENTES
    if($senha !== $confirmar_senha){
        echo "As senhas não coincidem!";
        exit;
    }

    // VERIFICAR SE EMAIL EXISTE
    $sql = "SELECT id FROM usuarios WHERE email = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$usuario]);

    $usuarioExiste = $stmt->fetch();

    // INVALIDAR USUÁRIO CADASTRADO
    if($usuarioExiste){
        echo "Usuário já cadastrado!";
        exit;
    }

    // CRIPTOGRAFAR SENHA
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // SALVAR DADOS NO BANCO
    $sql = "INSERT INTO usuarios (email, senha) VALUES (?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        htmlspecialchars($usuario),
        $senhaHash
    ]);

    // DIRECIONAR PARA PAINEL
    header("Location: login.php");
?>