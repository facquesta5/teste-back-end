<?php
include('../header.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <h5>Lista de usuários</h5>
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
                <tr class="text-center">
                    <td>Campo nome</td>
                    <td>Campo email</td>

                    <td class="text-center">
                        <a href=""><i class="far fa-edit">
                            </i></a>
                    </td>
                    <td class="text-center">
                        <a href=""><i class="fas fa-trash">
                            </i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>