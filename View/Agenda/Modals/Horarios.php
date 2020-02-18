<?php
//echo"<pre>";
//print_r($dados);
//echo"</pre>";
?>

<div  id="VerClientes" class="text-center">
</div>
<table class="table table-bordered table-responsive horario">
    <thead>

        <th class=' text-center'>Horario</th>
        <th class=' text-center'>Nome</th>
        <th class=' text-center'>Email</th>
        <th class=' text-center'>Telefone</th>
        <th class=' text-center'>#</th>
        
    </thead>
    <tbody class=' text-center'>
        <?php
        $x=0;
            foreach($dados['Horarios'] as $h)
            {
                echo"<tr>";
                echo"<td >".$h['hora']."</td>";
                
                if(isset($h['Agendado']['cliente']['nome']))
                {
                    
                    echo"<td>".$h['Agendado']['cliente']['nome']."</td>";
                    echo"<td>".$h['Agendado']['cliente']['email']."</td>";
                    echo"<td>".$h['Agendado']['cliente']['telefone']."</td>";
                    $d = explode("-", $h['Agendado']['data']);
                    echo"<td><button class='btn btn-danger' id='BtnExcluiCliente' data-dia='".$d[2]."' data-mes='".$d[1]."' data-ano='".$d[0]."' data-atendente='".$h['atendente']."' data-dia_s='".$h['dia_s']."' data-id='".$h['Agendado']['id']."' data-nome='".$h['Agendado']['cliente']['nome']."'><i class='fa fa-close'></i></button></td>";
                   
                   
                }
                else
                {
                    echo "<td colspan='4'><button class='btn btn-success' id='BtnAddClientes' data-horario='".$h['id']."' data-atendente='".$h['atendente']."' data-data='".$dados['Data']."'>Marcar</button></td>";
                }
                echo"</td>";
                
                $x++;
            }
        ?>    
    </tbody>
        
    
</table>