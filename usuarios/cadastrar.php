<?php
include('../header.php');
?>
<div class="container-fluid">
    <div class="container bg-light p-3 border rounded-3 mt-3" style="max-width:500px;">
        <h5>Cadastro de usuário</h5>
        <form action="" method="POST" >
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>

