<?php 
    session_start();

    require_once "../config/database.php";

    $usuario_id = $_SESSION['id'];

    $sql = "SELECT * FROM agendamentos WHERE usuario_id = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$usuario_id]);

    $agendamentos = $stmt->fetchAll();

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
    <link rel="stylesheet" href="../css/agendamentos.css">
    <title>Painel</title>
</head>
<body class="painel-body">
    <div class="container">
        <div class="topo">
            <h1>Seja bem-vindo(a) <?= $_SESSION['email'] ?></h1>
            <a href="../acesso/logout.php" class="sair">Sair</a>
        </div>
        

        <form action="../agendamentos/salvar_agendamento.php" method="post">
            <input type="text" name="titulo" placeholder="Título">
            <input type="text" name="descricao" placeholder="Descrição">
            <input type="datetime-local" name="data_agendamento" placeholder="Data/Hora">
            <button type="submit">Salvar</button>
        </form>
        <div class="table-container">

            <table border="1">

                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>

                <?php foreach($agendamentos as $agendamento){ ?>

                    <tr>

                        <td><?= $agendamento['titulo'] ?></td>

                        <td><?= $agendamento['descricao'] ?></td>

                        <td><?= $agendamento['data_agendamento'] ?></td>

                        <td>
                            <a class="excluir" href="../agendamentos/excluir.php?id=<?= $agendamento['id'] ?>">Excluir</a>
                            <a class="editar" href="../agendamentos/editar.php?id=<?= $agendamento['id'] ?>">Editar</a>
                        </td>

                    </tr>

                <?php } ?>

            </table>

        </div>
    </div>
</body>
</html>