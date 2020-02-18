<?php

//echo"<pre> form: ";
//print_r($dados);
//echo"</pre>";
?><form method="post" id="FormAtendentes">
<input type="hidden" name="Token" value="<?php echo $_SESSION['User']['Token']?>">
<?php
if(isset($dados['id'])){?>
<input type="hidden" name="id" value="<?php echo $dados['id'];?>">
<?php
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
            	<p>Dados Atendentes</p>
            </div>
            <div class="panel-body">
            	<label id="lnome">Nome: <input id="nome" type="text" class="form-control" <?php if(isset($dados['nome'])){echo"value='".$dados['nome']."'";} ?> name="nome"></label>
            	<label id="lEmail">Email: <input id="email" type="text" class="form-control" <?php if(isset($dados['email'])){echo"value='".$dados['email']."'";} ?> name="email"></label>
                <label id="lTelefone">Telefone: <input id="ntelefone" type="text" class="form-control" <?php if(isset($dados['telefone'])){echo"value='".$dados['telefone']."'";} ?> name="telefone"></label>
            	<label id="lQtdDia">Qtd por dia: <input id="qtddia" type="text" class="form-control" <?php if(isset($dados['qtddia'])){echo"value='".$dados['qtddia']."'";} ?> name="qtddia"></label>
            	
            </div>
            <div class="panel-footer">
            	<p>Dados Atendentes</p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade excluir" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Excluir</h4>
            </div>
            <form method="post" class="FormNovaBomba">
            <div class="modal-body">
                <p>Você tem certeza que deseja excluir este Atendente?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a type="button" class="btn btn-primary"id="btnconfirma" >Excluir</a>
            </div>
            </form>
        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog --> 
</div>