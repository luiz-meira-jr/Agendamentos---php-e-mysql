<?php 
    session_start();
    
    require_once "../config/database.php";

    $usuario = $_POST["usuario"] ?? "";
    $senha = $_POST["senha"] ?? "";

    if(empty ($usuario) || empty($senha)){
        echo "Preencha todos os campos!";
        exit;
    };

    $sql = "SELECT * FROM usuarios WHERE email = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$usuario]);

    $usuario = $stmt->fetch();

    if (!$usuario){
        header("Location: login.php");
        exit;
    }

    if(!password_verify($senha, $usuario['senha'])){
        header('Location: login.php');
        exit;
    }

    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['id'] = $usuario['id'];

    header("Location: ../painel/painel.php");
    exit;
?>