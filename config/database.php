<?php

$host = "localhost";
$port = "3307"; // coloque sua porta do MySQL
$db = "agendamento_db";
$user = "root";
$pass = "";

try {

    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$db;charset=utf8",
        $user,
        $pass
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch(PDOException $erro){

    die("Erro na conexão: " . $erro->getMessage());

}
?>