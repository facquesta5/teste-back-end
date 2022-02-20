<?php
include('../header.php');
include('../classes/Basic.class.php');
if($_GET['id']){
    $dados = new Basic;
    $dados = $dados->selectById('usuarios', $_GET['id']);
}
?>
<div class="container-fluid">

    <div class="container bg-light p-3 border rounded-3 mt-3" style="max-width:500px;">
        <h5>Edição de usuário</h5>
        <form method="post" action="form_user.php">
            <input type="hidden" name="editar_usuario" value="editar_usuario" >
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" >
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?php echo $dados['nome']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" 
                name="email" value="<?php echo $dados['email']; ?>" aria-describedby="emailHelp">
            </div>
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>