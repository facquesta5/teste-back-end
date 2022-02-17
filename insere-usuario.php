<?php

include('conexão.php');

class Usuario{

    public function create(){
        $data = [
            'nome' => $nome,
            'email' => $email,
            'endereco_id' => $endereco_id,
        ];
        $sql = "INSERT INTO usuario (nome, email, endereco_id) VALUES (:nome, :email, :endereco_id)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
    }

}



?>
