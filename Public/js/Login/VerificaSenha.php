<script type="text/javascript">

    	$("#btncriarsenha").on('click', function()
    	{

    		$(".erro").css({'display':'none'});

    		var usuario= $("#usuario").val();
                var senha1= $("#senha1").val();
    		var senha2= $("#senha2").val();                

    		if((usuario.length=="0") || (usuario ==" "))
                    {
                    $("#erro_usuario").css({'display':'block'});
                        return;
                    }

if((senha1.length=="0") || (senha1 ==" "))
                {
                $("#erro_senha").css({'display':'block'}).html('<i>O campo senha é obrigatorio</i>');
                    return;
                }
                if((senha2.length=="0") || (senha2==" "))
			{
    		$("#erro_senha").css({'display':'block'}).html('<i>O campo confirme a senha é obrigatorio</i>');
                            return;
			}
                if(senha1 !== senha2)
			{
    			$("#erro_senha").css({'display':'block'}).html('<i>As senhas devem ser iguais</i>');
                            return;
			}        
                        
			$("#formsenha").submit();
    	})

</script>