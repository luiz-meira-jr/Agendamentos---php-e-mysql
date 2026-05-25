<?php
    session_start();

    require_once "../config/database.php";

    $titulo = $_POST['titulo'] ?? "";
    $descricao = $_POST['descricao'] ?? "";
    $data_agendamento = $_POST['data_agendamento'] ?? "";

    $usuario_id = $_SESSION['id'];

    if(
        empty($titulo) ||
        empty($descricao) ||
        empty($data_agendamento)
    ){
        echo "Preencha todos os campos";
        exit;
    }

    $sql = "INSERT INTO agendamentos (usuario_id, titulo, descricao, data_agendamento)
    VALUES (?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $usuario_id,
        htmlspecialchars($titulo),
        htmlspecialchars($descricao),
        htmlspecialchars($data_agendamento)
    ]);

    header("Location: ../painel/painel.php");

?>