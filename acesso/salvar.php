<?php 
    require_once "../config/database.php";

    $usuario = $_POST["usuario"] ?? "";
    $senha = $_POST["senha"] ?? "";
    $confirmar_senha = $_POST["confirmar_senha"] ?? "";

    if (empty($usuario) || empty($senha) || empty($confirmar_senha)){
        echo "Preencha os campos!";
        exit;
    };

    if($senha !== $confirmar_senha){
        echo "As senhas não coincidem!";
        exit;
    }

    $sql = "SELECT id FROM usuarios WHERE email = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$usuario]);

    $usuarioExiste = $stmt->fetch();

    if($usuarioExiste){
        echo "Usuário já cadastrado!";
        exit;
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (email, senha) VALUES (?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        htmlspecialchars($usuario),
        $senhaHash
    ]);

    header("Location: login.php")
?>