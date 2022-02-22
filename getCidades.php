<?php
include('classes/Basic.class.php');

$dados = new Basic;
$tabela = $_POST['tabela'];
$id = $_POST['id'];
$dados = $dados->getCidades($tabela, $id);
echo $dados;
