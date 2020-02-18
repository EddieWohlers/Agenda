<?php

//echo"<pre> form: ";
//print_r($dados);
//echo"</pre>";
?><form method="post" id="FormHorarios">
<input type="hidden" name="Token" value="<?php echo $_SESSION['User']['Token']?>">
<?php
if(isset($dados['Horario']['id'])){?>
<input type="hidden" name="id" value="<?php echo $dados['Horario']['id'];?>">
<?php
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
            	<p>Dados Horarios</p>
            </div>
            <div class="panel-body">
            	<label id="lAtendente">Atendente: 
                    <select name="atendente" class="form-control">
                        <?php
                        if(isset($dados['Horario']['atendente']))
                        {
                            echo"<option value='".$dados['Horario']['atendente']['id']."'>".$dados['Horario']['atendente']['nome']."</option>";
                        }
                        foreach($dados['Atendentes'] as $a)
                        {
                            echo"<option value='".$a['id']."'>".$a['nome']."</option>";
                        }
                        ?>
                    </select>
                    <label>Dia da semana:
                        <select class="form-control" name='dia_s'>
                            <?php if(isset($dados['Horario']['dia_s']))
                            {
                            echo"<option value='".$dados['Horario']['dia_s']['id']."'>".$dados['Horario']['dia_s']['dia_s']."</option>";
                            }
                            foreach($dados['Dia_s'] as $d)
                            {
                                echo"<option value='".$d['id']."'>".$d['dia_s']."</option>";
                            }
                            ?>
                        </select>
                </label>
                    
            	<label id="lHora">Hora: <input id="hora" type="time" class="form-control" <?php if(isset($dados['Horario']['hora'])){echo"value='".$dados['Horario']['hora']."'";} ?> name="hora"></label>

            	
            	
            </div>
            <div class="panel-footer">
            	<p>Dados Horarios</p>
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
                <p>Você tem certeza que deseja excluir este Horario?
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