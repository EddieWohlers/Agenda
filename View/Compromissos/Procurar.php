<?php
//  echo"<pre>dados ";
//print_r($dados);
//echo"</pre>";
?>
<div class="row" >
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<p>Busca </p>
			</div>
			<div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="Tabela">
                                    <thead>
                                        <tr class='odd gradeX'>
                                            <th>Id</th>
                                            <th>Titulo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        foreach ($dados as $valor)
                                        {
                                            
                                                echo"<tr>";
                                                
                                                echo"<td><a href='Editar/".$valor['ID']."'>".$valor['ID']."</a></td>";
                                                echo"<td><a href='Editar/".$valor['ID']."'>".$valor['Titulo']."</a></td>";
                                                
                                                echo"</tr>";
                                        }

	        				?>

		        	</tbody>
		        </table>
			</div>
			<div class="panel-footer">
				Busca
			</div>
		</div>
	</div>
</div>