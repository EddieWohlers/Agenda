<?php

//echo"<pre> form: ";
//print_r($dados);
//echo"</pre>";
?><form method="post" id="FormCompromissos">
<input type="hidden" name="Token" value="<?php echo $_SESSION['User']['Token']?>">
<?php
if(isset($dados['id'])){?>
<input type="hidden" name="id" value="<?php echo $dados['id'];?>">
<?php
}
?>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
            	<p>Local</p>
            </div>
            <div class="panel-body">
            	<label id="lcidade">Cidade: <input id="cidade" type="text" class="form-control" <?php if(isset($dados['cidade'])){echo"value='".$dados['cidade']."'";} ?> name="cidade"></label>
            	<label id="lestado">Estado: <input id="estado" type="text" class="form-control" <?php if(isset($dados['estado'])){echo"value='".$dados['estado']."'";} ?> name="estado"></label>
                <label id="llocal">Local: <input id="local" type="text" class="form-control" <?php if(isset($dados['local'])){echo"value='".$dados['local']."'";} ?> name="local"></label>

            </div>
            <div class="panel-footer">
            	<p>Local</p>
            </div>
        </div>
    </div>
        <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
            	<p>Show</p>
            </div>
            <div class="panel-body">
            	<label id="ltitulo">Titulo: <input id="titulo" type="text" class="form-control" <?php if(isset($dados['titulo'])){echo"value='".$dados['titulo']."'";} ?> name="titulo"></label>
            	<label id="ltipo">Tipo de Show: <input id="tipo" type="text" class="form-control" <?php if(isset($dados['tipo'])){echo"value='".$dados['tipo']."'";} ?> name="tipo"></label>
                <label id="lartista">Artista: <input id="artista" type="text" class="form-control" <?php if(isset($dados['artista'])){echo"value='".$dados['artista']."'";} ?> name="artista"></label>
                <label id="lcategoria">Categoria: <input id="categoria" type="text" class="form-control" <?php if(isset($dados['categoria'])){echo"value='".$dados['categoria']."'";} ?> name="categoria"></label>
            </div>
            <div class="panel-footer">
            	<p>Show</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
            	<p>Data</p>
            </div>
            <div class="panel-body">
            	<label id="ldata">Data: <input id="data" type="text" class="form-control" <?php if(isset($dados['data'])){echo"value='".$dados['data']."'";} ?> name="data"></label>
            	<label id="lhoraini">Hora de Inicio: <input id="horaini" type="text" class="form-control" <?php if(isset($dados['horaini'])){echo"value='".$dados['horaini']."'";} ?> name="horaini"></label>
                <label id="lhorafim">Hora de Termino: <input id="lhorafim" type="text" class="form-control" <?php if(isset($dados['horafim'])){echo"value='".$dados['horafim']."'";} ?> name="horafim"></label>

            </div>
            <div class="panel-footer">
            	<p>Data</p>
            </div>
        </div>
    </div>
        <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
            	<p>Financeiro</p>
            </div>
            <div class="panel-body">
            	<label id="lforma_pag">Forma de Pagamento: <input id="forma_pag" type="text" class="form-control" <?php if(isset($dados['forma_pag'])){echo"value='".$dados['forma_pag']."'";} ?> name="forma_pag"></label>
            	<label id="lstatus">Status: 
                    <select id="status" class="form-control" name="status">
                                    
                    <?php if(isset($dados['status'])){
                        echo"<option value='".$dados['status']."'>".$dados['status']."</option>";} ?>
                        <option value="Reserva" style="color:#ccc">Reserva</option>
                        <option value="Tramitação"  style="color:#191970">Tramitação</option>
                        <option value="Confirmado" style="color:#1E90FF">Confirmado</option>
                        <option value="Compromisso" style="color:#90EE90">Compromisso</option>
                        <option value="Pessoal" style="color:#00FF00">Pessoal</option>
                        <option value="Outros" style="color:#8B0000">Outros</option>
                    </select>
                <label id="ldestaque">Destaque: <input id="ldestaque" type="text" class="form-control" <?php if(isset($dados['destaque'])){echo"value='".$dados['destaque']."'";} ?> name="destaque"></label>

            </div>
            <div class="panel-footer">
            	<p>Financeiro</p>
            </div>
        </div>
    </div>
</div>
</form>
<div class="modal fade excluir" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Excluir</h4>
            </div>
            <form method="post" class="FormNovaBomba">
            <div class="modal-body">
                <p>Você tem certeza que deseja excluir este item?
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