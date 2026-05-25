<?php 
    session_start();

    require_once "../config/database.php";

    if(!isset($_SESSION['nome'])){

        header("Location: ../acesso/login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painel.css">
    <title>Painel</title>
</head>
<body>
    <div id="container">
        <h1>Seja bem-vindo(a) <?= $_SESSION['email'] ?></h1>
        <a href="../acesso/logout.php">Sair</a>
    </div>
</body>
</html>