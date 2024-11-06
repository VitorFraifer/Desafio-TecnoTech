<?php

try {
    // Configurações da conexão
    $host = 'localhost';
    $dbname = 'TecnoTech';
    $user = 'postgres';
    $password = 'vitor123';

    // Criando a conexão com PDO
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

    // Configurando o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>