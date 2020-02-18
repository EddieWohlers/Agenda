<script type="text/javascript">
    $(function(){
    $(document).on('click', '#excluir', function(e) {
        e.preventDefault;
        var id = $(this).data('id');
            $("#btnconfirma").attr({"href":"/<?php echo $pg;?>/Excluir/"+id});
          
        })})
        </script>