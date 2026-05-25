<?php

session_start();

require_once "../config/database.php";

$id = $_GET['id'] ?? null;

$usuario_id = $_SESSION['id'];

if(!$id){
    echo "ID inválido";
    exit;
}

$sql = "SELECT * FROM agendamentos
WHERE id = ? AND usuario_id = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $id,
    $usuario_id
]);

$agendamento = $stmt->fetch();

if(!$agendamento){
    echo "Agendamento não encontrado";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/agendamentos.css">
    <title>Editar Agendamento</title>
</head>

<body class="editar-body">
    <div class="container">
        <h1>Editar Agendamento</h1>

        <form action="atualizar.php" method="post">

            <input
                type="hidden"
                name="id"
                value="<?= $agendamento['id'] ?>"
            >

            <input
                type="text"
                name="titulo"
                value="<?= $agendamento['titulo'] ?>"
            >

            <input
                type="text"
                name="descricao"
                value="<?= $agendamento['descricao'] ?>"
            >

            <input
                type="datetime-local"
                name="data_agendamento"
                value="<?= date('Y-m-d\TH:i', strtotime($agendamento['data_agendamento'])) ?>"
            >

            <button type="submit">
                Atualizar
            </button>

        </form>
    </div>
    

</body>

</html>