<?php
include('../classes/Basic.class.php');

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
    //echo '<pre>';
    //print_r($endereco);
    //die();
    $endereco = $user->edit('enderecos', $endereco, $_POST['endereco_id']);
    
    /*$datos_pessoais = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email']
    ];
    $datos_pessoais = $user->edit('usuarios', $datos_pessoais, $id);
*/
    header('Location: index.php');
}

if($_GET['action'] == 'delete'){
    $user = new Basic; 
    $deleta_usuario = $user->delete('usuarios', $_GET['id']);
}
if($_GET['action'] == 'view'){
    $user = new Basic; 
    $detalhes_usuario = $user->view($_GET['id']);
    echo '<pre>';
    print_r($detalhes_usuario);
}





