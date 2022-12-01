<?php

    $host = 'localhost';
    $dbname = 'db_usuarios';
    $user = 'root';
    $pass = '';

    try {

        $conexao = new PDO(
            "mysql:host=$host; dbname=".$dbname, $user, $pass
        );

    } catch (PDOException $e){
        echo "Ocorrreu um erro de conexão: {$e->getMessage()}";
        $conexao = null;
    }
?>