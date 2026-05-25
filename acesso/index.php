<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/acesso.css">
    <title>Agendamentos</title>
</head>
<body>
    <div id="container">
        <h1>Cadastro</h1>
        <form action="salvar.php" method="post">
            <input type="text" name="usuario" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <input type="password" name="confirmar_senha" placeholder="Confirmar senha">
            <button type="submit" onclick="cadastrar()">Cadastrar</button>
        </form>
        <a href="login.php">Fazer login</a>
    </div>
    
</body>
</html>