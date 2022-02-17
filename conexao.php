<?php

$pdo = new PDO('mysql:host=localhost; dbname=teste_back_end', 'root', '');

$name = 'Ricardo';

try {
    $conn = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = $conn->query('SELECT * FROM minhaTabela WHERE nome = ' . $conn->quote($name));

    foreach($data as $row) {
        print_r($row);
    }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}



?>