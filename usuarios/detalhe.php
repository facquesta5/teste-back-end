<?php
include('../header.php');
include('../classes/Basic.class.php');


if($_GET['action'] == 'view'){
    $user = new Basic; 
    $detalhes_usuario = $user->detalhesUsuario($_GET['id']);
    echo '<pre>';
    print_r($detalhes_usuario);

}
?>

