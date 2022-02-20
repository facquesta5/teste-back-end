<?php
include('../header.php');
include('../classes/Basic.class.php');
    $user = new Basic;
    $user = $user->list('usuarios');

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <h5 class="mt-3 float-start">Lista de usuários</h5>
        
        <a class="col-md-2 btn btn-success font-weight-bold mt-3 float-end"
        href="cadastrar.php">
        <i class="fas fa-plus"></i> Novo usuário</a>

        <table id="myTable" class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th>Nome</th>
                    <th>Email</th>
                    <th class="text-center">Alterar</th>
                    <th class="text-center">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach( $user as $k => $v){
                ?>
                <tr class="text-center">
                    <td><?php echo $v['nome']; ?></td>
                    <td><?php echo $v['email']; ?></td>
                    <td class="text-center">
                        <a href="editar.php?id=<?php echo $v['id']; ?>">
                            <i class="far fa-edit">
                        </i></a>
                    </td>
                    <td class="text-center">
                        <a href="form_user.php?action=delete&id=<?php echo $v['id']; ?>"
                            onclick="return confirm('Deseja mesmo excluir o usuário');">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>       
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
