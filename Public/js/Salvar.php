<script type="text/javascript">
    jQuery(document).ready(function(){
        
            jQuery("#Form<?php echo $pg;?>").submit(function(){
                
                    var dados = jQuery( this ).serialize();
                    $( ".panel-heading" ).first().append("<div class='progress' ><div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' style='width: 0%' aria-valuenow='10' aria-valuemin='0' aria-valuemax='100'></div></div>");
                    $(".progress-bar").animate({width: "50%"}, 100);
                    jQuery.ajax({
                        
                            type: "POST",
                            url: "/<?php echo $pg;?>/Salvar",
                            data: dados,
                            success: function( data )
                            { 
                                $(".progress-bar").addClass("progress-bar-success").animate({width: "100%"}, 100);
                            //    $( "#Form<?php echo $pg;?>" ).fadeOut(800, function(){$(this).remove();});    
                            //    $( "#Verifica<?php echo $pg;?>" ).last().fadeOut(800, function(){$(this).remove();});    
                                
                                $( ".panel-heading" ).first().append( "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><?php echo $pg;?> Salva com sucesso!</div>" );
                                    $(".progress").fadeOut(800, function(){$(this).remove();});    
                                
                            }
                    });
                    
                    return false;
                    
            });
    });
    </script>