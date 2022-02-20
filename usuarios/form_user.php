<?php
include('../classes/Basic.class.php');

if(isset($_POST['cadastrar_usuario'])){
    $user = new Basic;
    $data = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email']
    ];
    $cadastra_usuario = $user->create('usuarios', $data);
}

if(isset($_POST['editar_usuario'])){
    $user = new Basic;
    $data = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email']
    ];
    $id = $_POST['id'];
    $edita_usuario = $user->edit('usuarios', $data, $id);
}

if($_GET['action'] = 'delete'){
    $user = new Basic; 
    $deleta_usuario = $user->delete('usuarios', $_GET['id']);
    //echo '<pre>';
    //print_r($_GET);
    //die();
}






