    <script type="text/javascript">
$('.modalhorarios').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget)
    
  var atendente = button.data('atendente');
  var dia = button.data('dia');
  var mes = button.data('mes');
  var ano = button.data('ano');
  var dia_s = button.data('dia_s');
    jQuery.ajax({
                        
            type: "POST",
            url: "/Agenda/Horarios/",
            data: "atendente="+atendente+"&dia="+dia+"&mes="+mes+"&ano="+ano+"&dia_s="+dia_s,

            success: function( data )
            { 
                $('.modal-body').html(data);
            }
    });
  

})
</script>