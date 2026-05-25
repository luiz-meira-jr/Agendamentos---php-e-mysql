<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/acesso.css">
    <title>Login</title>
</head>
<body>
    <div id="container">
        <h1>Login</h1>
        <form action="logar.php" method="post">
            <input type="text" name="usuario" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <button type="submit">Entrar</button>
        </form>
        <a href="index.php">Fazer cadastro</a>
    </div>
</body>
</html>