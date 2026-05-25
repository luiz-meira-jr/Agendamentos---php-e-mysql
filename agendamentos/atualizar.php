<?php

session_start();

require_once "../config/database.php";

$id = $_POST['id'] ?? null;

$titulo = $_POST['titulo'] ?? "";
$descricao = $_POST['descricao'] ?? "";
$data_agendamento = $_POST['data_agendamento'] ?? "";

$usuario_id = $_SESSION['id'];

if(
    !$id ||
    empty($titulo) ||
    empty($descricao) ||
    empty($data_agendamento)
){
    echo "Preencha todos os campos";
    exit;
}

$sql = "UPDATE agendamentos
SET titulo = ?, descricao = ?, data_agendamento = ?
WHERE id = ? AND usuario_id = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    htmlspecialchars($titulo),
    htmlspecialchars($descricao),
    $data_agendamento,
    $id,
    $usuario_id
]);

header("Location: ../painel/painel.php");
exit;

?>