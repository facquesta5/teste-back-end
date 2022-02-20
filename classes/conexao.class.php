<?php

class Conexao{
    public function __construct(){
        $this->conn = new PDO('mysql:host=localhost; dbname=teste_back_end', 'root', '');
    }
}