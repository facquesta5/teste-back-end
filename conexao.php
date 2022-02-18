<?php

try {
    $conn = new PDO('mysql:host=localhost; dbname=teste_back_end', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

$data = $conn->query('SELECT * FROM usuario');

    foreach($data as $row) {
        echo '<pre>';
        print_r($row);
    }

?>