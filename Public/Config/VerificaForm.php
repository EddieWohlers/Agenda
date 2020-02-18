<?php 
if(isset($dados['Config'])){
    if(!empty($dados['Config'])){
$campos = explode(",", $dados['Config']['Form']['campos_obrigatorios']);     
$campos = array_filter($campos);
?>
<script type="text/javascript">
    	$("#Verifica<?php echo $pg;?>").on('click', function()
    	{
                $('.alert').remove();                
                <?php 
                foreach($campos as $c)
                {
    		echo "var $c  = $('#$c').val(); \n";
                ?>
    		if((<?php echo $c;?>.length=="0") || (<?php echo $c;?> ==" "))
                    {
                   
                    $( ".panel-heading" ).first().append( "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Falha ao enviar!</div>" );
                    $("#<?php echo $c;?>").css({'border-color':'red'});
                    $("#l<?php echo $c;?>").css({'color':'red'});
                    $("#<?php echo $c;?>").attr({'placeholder':'Este campo é obrigatório'});

                        return;
                    }
                else
                    {
                    $("#<?php echo $c;?>").css({'border-color':'green'});
                    $("#l<?php echo $c;?>").css({'color':'green'});

                    }
              <?php  } ?>    
			$("#Form<?php echo $pg;?>").submit();
    	})

</script>
<?php
}}
?>