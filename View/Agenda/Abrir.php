<?php
//echo"<pre>";
//print_r($dados);
//echo"</pre>";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

foreach ($dados['Agenda'] as $a)
{
    if(isset($dia[$a['dia']]))
    {
        $dia[$a['dia']]++;
    }
    else
    {
        $dia[$a['dia']]=1;
    }
}
$mesano = explode("-",$dados['Data']);
foreach($dados['Horarios'] as $d)
{
 if(isset($ds[$d['dia_s']]))
 {
     $ds[$d['dia_s']]++;
 }
 else
 {
     $ds[$d['dia_s']] =1;    
 }
       
}
?>
<table class="table table-responsive table-bordered ">
    <thead>
        <tr>
            <th class="text-center">Domingo</th>
            <th class="text-center">Segunda</th>
            <th class="text-center">Terça</th>
            <th class="text-center">Quarta</th>
            <th class="text-center">Quinta</th>
            <th class="text-center">Sexta</th>
            <th class="text-center">Sabado</th>
        </tr>
    </thead>
    <tbody>
        <?php
            echo"<tr>";
            $x=0;
            $i=01;
            $i= $i - $dados['DiaSemana'];
            
            while($i <= $dados['DiasMes'])
            {
                
                if($i < 1){
                    echo"<td class='bg-danger '></td>";  
                }
                else{
                    echo"<td class='text-center'>";
                    if($i<10){$i= "0$i";}
                    if(isset($ds))
                        {
                                if(array_key_exists($x, $ds))
                                    {
                                        if(isset($dia))
                                            {
                                            
                                                if(array_key_exists($i, $dia))
                                                    {
                                                        if($dia[$i] == $ds[$x])
                                                        {
                                                            echo"<button class='btn btn-lg btn-danger'  data-toggle='modal' data-target='.modalhorarios' data-atendente='".$dados['Atendente']['id']."' data-dia='$i' data-mes='".$mesano[1]."' data-ano='".$mesano[0]."' data-dia_s='$x'>$i<hr>Lotado</button>";            
                                                        }
                                                        else
                                                        {
                                                            if($dia[$i] < $ds[$x])
                                                            {
                                                                $l = $ds[$x] - $dia[$i];
                                                                echo"<button class='btn btn-lg btn-warning' data-toggle='modal' data-target='.modalhorarios' data-atendente='".$dados['Atendente']['id']."' data-dia='$i' data-mes='".$mesano[1]."' data-ano='".$mesano[0]."' data-dia_s='$x'>$i<hr>Disponível ($l)</button>";           

                                                            }
                                                        }
                                                    }
                                                    else 
                                                    {
                                                        echo"<button class='btn btn-lg btn-info' data-toggle='modal' data-target='.modalhorarios' data-atendente='".$dados['Atendente']['id']."' data-dia='$i' data-mes='".$mesano[1]."' data-ano='".$mesano[0]."' data-dia_s='$x'>$i<hr>Livre</button>";           
                                                    }
                                            }
                                        else {
                                        echo"<button class='btn btn-lg btn-info' data-toggle='modal' data-target='.modalhorarios' data-atendente='".$dados['Atendente']['id']."' data-dia='$i' data-mes='".$mesano[1]."' data-ano='".$mesano[0]."' data-dia_s='$x'>$i<hr>Livre</button>";           
                                            }

                                    }
                                else 
                                    {
                                        echo"<button class=' btn btn-lg btn-secondary disabled'>$i<hr>Fechado</button>";            
                                    } 
                        }
                    echo"</td>";
                                
                    }                            
             

                $x++;
                if($x >= 7)
                {
                    echo"</tr><tr>";
                    $x=0;
                }
                $i++;
            }
            while($x < 7)
            {
                echo"<td class='bg-danger disabled'></td>";
                $x++;
            }
        ?>
        </tr>
    </tbody>
</table>

<div class="modal fade modalhorarios" role="dialog">
  <div class="modal-dialog modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Horarios</h4>
      </div>
      <div class="modal-body">
      </div>
    </div>

  </div>
</div>