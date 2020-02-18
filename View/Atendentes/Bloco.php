 <div id="page-wrapper">
	<div class="row" >
		<div class="col-lg-12">
			<div class="panel-heading">
				<h1 class="page-header">
					Atendentes
					<a  class="btn btn-primary" title="Buscar Atendentes" data-toggle="collapse" data-parent="#accordion" href="#collapseBuscarAtendentes"><i class="fa fa-search fa-2x"></i></a>
					<a href="/Atendentes/Novo" class="btn btn-primary" title="Adicionar novo"><i class="fa  fa-file-text-o fa-2x"></i></a>
	    			<?php if($path=="Atendentes/Editar" || $path=="Atendentes/Novo"){?>
                                        <a onclick="$('#FormAtendentes').submit();" class="btn btn-success" title="Salvar"><i class="fa fa-save fa-2x"></i></a>
                             
                                    <?php }?>
                                <?php if($path=="Atendentes/Editar" ){?>        
                                        
                                               <a class="btn btn-danger" title="Excluir" id="excluir"
                                            data-toggle="modal"
                                                   data-target=".excluir"
                                                   data-id="<?php echo $dados['id'];?>"
                                                   ><i class="fa fa-close fa-2x"></i></a>                                           
                                 <?php }?>                  
	    			</h1>
	    	</div>
	    </div>
	</div>
	<div class="panel-collapse collapse" id="collapseBuscarAtendentes">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-primary">
	        	<div class="panel-heading">Buscar Atendentes</div>
					<div class="panel-body">
						<form method="post" id="FormBuscar" action="/Atendentes/Procurar">
							<input type="hidden" name="Token" value="<?php echo $_SESSION['User']['Token']?>">
							<div class="form-group input-group">
								<input type="text" class="form-control" name="like" id="like">
									
	                            <span class="input-group-btn">
									<button class="btn btn-default" type="submit" id="verificaBusca"><i class="fa fa-search"></i></button>

	                            </span>
							</div>
                                                                                        <div class="form-group input-group">
                                    <label class="checkbox-inline"><input id="campo" type="checkbox"name="campos[]" value="nome" checked>Nome</label>
                                    <label class="checkbox-inline"><input id="campo" type="checkbox"name="campos[]" value="email" checked>Email</label>
                                    <label class="checkbox-inline"><input id="campo" type="checkbox"name="campos[]" value="telefone" checked>Telefone</label>
                                    
                                                                        
				</div>
			            </form>
			        </div>
		            <div class="panel-footer">Buscar Nome</div>
				</div>
			</div>
		</div>
	</div>
