<?php

include('conexão.php');

class Usuario{

    public function insert(){
        $data = [
            'nome' => $nome,
            'email' => $email
        ];
        $sql = "INSERT INTO usuario (nome, email) VALUES (:nome, :email,)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
    }

}



?>
