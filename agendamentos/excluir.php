<?php

    session_start();

    require_once "../config/database.php";

    $id = $_GET['id'] ?? null;

    $usuario_id = $_SESSION['id'];

    if(!$id){
        echo "ID inválido";
        exit;
    }

    $sql = "DELETE FROM agendamentos
    WHERE id = ? AND usuario_id = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $id,
        $usuario_id
    ]);

    header("Location: ../painel/painel.php");
exit;

?>