<?php
include('../header.php');
?>
<div class="container-fluid">
    
    <div class="container bg-light p-3 border rounded-3 mt-3" style="max-width:500px;">
        <h5>Cadastro de cidade</h5>
        <form>
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>
