<script type="text/javascript">
    //btn exclui
    $(document).on('click','#BtnExcluiCliente',function(e){ 
  
e.preventDefault;
    
  var id = $(this).data('id');
  var nome = $(this).data('nome');
  var dia = $(this).data('dia');
  var mes = $(this).data('mes');
  var ano = $(this).data('ano');
  var atendente = $(this).data('atendente');
  var dia_s = $(this).data('dia_s');
  $('#VerClientes').html("<div class='row'><div class='col-lg-12'><div class='panel panel-primary'><div class='panel-body'><p>Confirma o desagendamento do cliente "+nome+"?</p><p><button class='btn btn-success' id='BtnCofirmaDes' data-id='"+id+"' data-dia='"+dia+"' data-mes='"+mes+"' data-ano='"+ano+"'  data-atendente='"+atendente+"' data-dia_s='"+dia_s+"'><i class='fa fa-check'></i></button></p></div></div></div></div>");
  })
  //fim btn excluit
  
  //btn confirma exclusao
    $(document).on('click','#BtnCofirmaDes',function(e){ 
  
    e.preventDefault;
    
  var id = $(this).data('id');
  var dia = $(this).data('dia');
  var mes = $(this).data('mes');
  var ano = $(this).data('ano');
  var atendente = $(this).data('atendente');
  var dia_s = $(this).data('dia_s');
            $('#VerClientes').html("<div class='progress' ><div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' style='width: 0%' aria-valuenow='10' aria-valuemin='0' aria-valuemax='100'></div></div>");
            $(".progress-bar").animate({width: "50%"}, 100);
        jQuery.ajax({
                        
        type: "POST",
        url: "/Agenda/Salvar",
        data: "id="+id+"&status=Desagendado&Token=<?php echo $_SESSION['User']['Token'];?>",
        success: function(data)
        { 

            jQuery.ajax({
            type: "POST",
            url: "/Agenda/Horarios",
            data: "dia="+dia+"&mes="+mes+"&ano="+ano+"&atendente="+atendente+"&dia_s="+dia_s,
            success: function( data )
            {
                $(".progress-bar").addClass("progress-bar-success").animate({width: "100%"}, 100);        
                $(".progress").fadeOut(800, function(){$(this).remove();});  
                $(".horario").html(data);
            }
            })

            }
            })
            })
  //fim da desmarcação
  // começo marcação
  
      $(document).on('click','#BtnAddClientes',function(e){ 
  
    e.preventDefault;
    
  var horario = $(this).data('horario');
  var data = $(this).data('data');
  var atendente = $(this).data('atendente');
  
  $('#VerClientes').html("<div class='row'><div class='col-lg-12'><div class='panel panel-primary'><div class='panel-body'><form action='/Agenda/Salvar' method='post'><input type='hidden' name='Token' value='<?php echo $_SESSION['User']['Token'];?>'><input type='hidden' name='status' value='Agendado'><input type='hidden' name='horario' value='"+horario+"'><input type='hidden' name='data' value='"+data+"'><input type='hidden' name='atendente' value='"+atendente+"'> <div class='form-row'><div class='form-group'><label> <select name='cliente' class='form-control' ><option>Escolha o cliente</option><?php foreach($dados['Clientes'] as $cli){echo"<option value='".$cli['id']."'>".$cli['nome']."</option>";}?></select></label><button type='submit' class='btn btn-success'>Marcar</button></div></div></form></div></div></div></div>");
  
  })
            
            
  </script>  