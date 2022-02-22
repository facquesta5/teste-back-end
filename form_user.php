<?php
include('classes/Basic.class.php');

if(isset($_POST['cadastrar_usuario'])){
    $user = new Basic;
    
    $endereco = [
        'rua' => $_POST['rua'],
        'numero' => $_POST['numero'],
        'complemento' => $_POST['complemento'],
        'bairro' => $_POST['bairro'],
        'cep' => $_POST['cep'],
        'estado_id' => $_POST['estado_id'],
        'cidade_id' => $_POST['cidade_id']
    ];
    $endereco_id = $user->create('enderecos', $endereco);

    $dados_pessoais = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'endereco_id' => $endereco_id
    ];
    $dados_pessoais = $user->create('usuarios', $dados_pessoais);
    
    header('Location: index.php');
}

if(isset($_POST['editar_usuario'])){
    $user = new Basic;
    $endereco = [ 
        'rua' => $_POST['rua'],
        'numero' => $_POST['numero'],
        'complemento' => $_POST['complemento'],
        'bairro' => $_POST['bairro'],
        'cep' => $_POST['cep'],
        'estado_id' => $_POST['estado_id'],
        'cidade_id' => $_POST['cidade_id']
    ]; 
    $endereco = $user->edit('enderecos', 'id', $endereco, $_POST['endereco_id']);
    $dados_pessoais = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email']
    ];
    
    $dados_pessoais = $user->edit('usuarios', 'endereco_id', $dados_pessoais, $_POST['endereco_id']);
    header('Location: index.php');
}

if($_GET['action'] == 'delete'){
    $user = new Basic; 
    $deleta_usuario = $user->delete('usuarios', 'id', $_GET['id']);
    $deleta_usuario = $user->delete('enderecos', 'id', $_GET['endereco_id']);
    header('Location: index.php');
}






