<?php
include('header.php');
include('classes/Basic.class.php');
if($_GET['id']){
    $dados = new Basic;
    $dados = $dados->view($_GET['id']);
    $data_estados = new Basic;
    $data_cidades = new Basic;

    //echo '<pre>';
    //print_r($dados);

}
?>
<div class="container-fluid">

    <div class="container bg-light p-3 border rounded-3 mt-3" style="max-width:600px;">
        <h5>Edição de usuário</h5>
        <form method="post" action="form_user.php">
            <input type="hidden" name="editar_usuario" value="editar_usuario" >
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" >
            <input type="hidden" name="endereco_id" value="<?php echo $dados[0]['endereco_id']; ?>" >
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?php echo $dados[0]['nome']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" 
                name="email" value="<?php echo $dados[0]['email']; ?>" aria-describedby="emailHelp">
            </div>
            <div class="mb-1">
                <label class="form-label">Endereço</label>
                <input type="text" class="form-control" 
                value="<?php echo $dados[0]['rua']; ?>" name="rua">
            </div>
            <div class="mb-1">
                <label class="form-label">Número</label>
                <input type="text" class="form-control" 
                value="<?php echo $dados[0]['numero']; ?>" name="numero">
            </div>
            <div class="mb-1">
                <label class="form-label">Bairro</label>
                <input type="text" class="form-control" 
                value="<?php echo $dados[0]['bairro']; ?>" name="bairro">
            </div>
            <div class="mb-1">
                <label class="form-label">Complemento</label>
                <input type="text" class="form-control"
                value="<?php echo $dados[0]['complemento']; ?>" name="complemento">
            </div>
            <div class="mb-1">
                <label class="form-label">cep</label>
                <input type="text" class="form-control"
                value="<?php echo $dados[0]['cep']; ?>" name="cep">
            </div>
            <?php
            $data = $data_estados->list('estados');
            ?>
            <div class="mb-1">
                <label class="form-label">Estado</label>
                <select class="form-select" name="estado_id" id="select-estado">
                    <option value="" selected> * * * Estado * * * </option>
                    <?php foreach($data as $key => $value){ ?>
                        <option 
                        <?php if($dados[0]['estado_id'] == $value['id'])
                                echo 'selected'; ?>
                        value="<?php echo $value['id'] ; ?>"><?php echo $value['uf'] ; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <?php
            $cidades = $data_cidades->listCidades('cidades', $dados[0]['estado_id']);
            //echo '<pre>';
            //print_r($data);
            ?>
            <div class="mb-1">
                <label class="form-label">Cidades</label>
                <select class="form-select" name="cidade_id" id="select-cidade">
                    <option selected> * * * Cidade * * * </option>
                    <?php foreach($cidades as $key => $value){ ?>
                        <option 
                        <?php if($dados[0]['cidade_id'] == $value['id'])
                                echo 'selected'; ?>
                        value="<?php echo $value['id'] ; ?>"><?php echo $value['nome'] ; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>


<script>
$('document').ready(function(){
 $("#select-estado").on("change", function(){ getCidades(); });

    function getCidades(){
        if($('#select-estado').val() != ''){
            $.ajax({
                url: 'getCidades.php',
                type: 'POST',
                data: {
                    id: $('#select-estado option:selected').val(),
                    tabela: 'cidades'
                },
                success: function(result){
                    console.log(result);
                    $('#select-cidade').prop("disabled", true);
                    $('#select-cidade').removeAttr("disabled");

                    var options = $('#select-cidade');
                    options.find('option').remove();

                    jQuery.each( JSON.parse(result), function( key, value ) {
                        $( "#select-cidade").append("<option value='"+ value.id +"'>"+ value.nome +"</option>");
                    });
                },
                error: function(result){
                    console.log(result);
                    $('meta[name="csrf-token"]').attr('content', result.token);
                    btn_enable(btn, btn_text);
                }
            });
        }
    }
});
</script>