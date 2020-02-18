<?php
namespace Lib\View;
class ViewModel
{
     public static function renderoff($path,$dados, $pg, $scripts,$config)
     {
         $p = explode("/",$path);
         
         require "../View/".$p[0]."/Modals/".$p[1].".php";
     }
    public static function render($path,$dados, $pg, $scripts,$config)
    {    
        
        require "Cabecalho.php";
        require "Topo.php";
        require "Menu.php"; 
        
        require "../View/$pg/Bloco.php";

        $m = explode("/", $path);
        
        if(($m[1] =="Editar") || ($m[1] =="Novo"))
        {
        	require "../View/$pg/Form.php";
                
        }
        else {
            require "../View/$path.php";
        }
        require "HeaderRodape.php";
        require "scripts.php";
        
        if($config){
            $conf = explode(",",$config);
            $conf = array_filter($conf);
            
            foreach($conf as $c){
        		require "Config/".$c.".php"; 
                        
        	}
        }
        require "js/Salvar.php";
        require "js/Excluir.php";
        if($scripts){
        	$js = explode(",",$scripts);
                $js = array_filter($js);
                
        	foreach($js as $j){
                    
        		require "js/".$j.".php"; 
        	}
        }
        require "Rodape.php";
           
        }
     public static function renderLogin()
    {

        //ate ak;i td certo agora vamos mostrar as views
        // para cada controller precisa ter as views com o mesmo nome
        require "Cabecalho.php";

        require "../View/Login/Login.php";
        require "HeaderRodape.php";
        require "scripts.php";
        require "Rodape.php";
    }
    public static function renderErro()
    {

    	//ate ak;i td certo agora vamos mostrar as views
    	// para cada controller precisa ter as views com o mesmo nome
    	require "Cabecalho.php";

    	require "Error.php";
    	require "HeaderRodape.php";
    	require "scripts.php"; 
    	require "Rodape.php";
    }


}