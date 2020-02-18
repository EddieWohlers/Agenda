<?php

namespace Controller;
use Lib\View\ViewModel;//assim ele indica que vamos usar ???? intendivou publicar
class FrontController{
    public function run() {
    session_start (); // aqui agente inicia uma supervariavel uma variavel de sessão
    $pagina = $_SERVER ['REQUEST_URI']; // aki agente pega o link tipo esse tudo q tiver depoi da barra e guarda na variavel
    $arrayPag = preg_split ( '/\//', $pagina, - 1, PREG_SPLIT_NO_EMPTY ); //aki agente divide a variavel em "pedaços"


    $controller = "Controller\\"; //aki começamos a montar uma variavel chamada controller
    $controller .= (isset ( $arrayPag [0] )) ? $arrayPag [0] : 'Index';//isso é uma forma simplificada da função if else ok
// ex se existir a primeira parte  do array $arrayPag controller = $arrayPag se não = index
    $pathView = (isset ( $arrayPag [0] )) ? $arrayPag [0] : 'Index'; //aki é a mesma coisa porem gravamos em outra vaariavel
    $pg = $pathView;
    $action = (isset ( $arrayPag [1] )) ? $arrayPag [1] : 'Index';
    $pathView .= "/$action";
    $id = (isset ( $arrayPag [2] )) ? $arrayPag [2] : null;

    if(isset($_SESSION['User']) || $action=="Verificar")
        {
        
            if (!class_exists ( $controller ))//verifica se o controller esta sendo acessado existe se não existir retorna erro
            {

                ViewModel::renderErro ( $pathView, $pg );
                return;
                exit ();
            }
            $controller = new $controller ();//cria uma estancia do controller

            if (! method_exists ( $controller, $action ))//aki é mesma coisa so q com metodo
            {
                ViewModel::renderErro ( $pathView, $pg );//viewmodel é a classe q juntas as camdas de vizualização .. vamos criar ainda
                return;
                exit ();
            }
            if (property_exists ( $controller, "scripts" ))
            {
            	$scripts = $controller->scripts;
            }
            else
            {
            	$scripts =null;
            }
            if (property_exists ( $controller, "config" ))
            {
            	$config = $controller->config;
            }
            else
            {
            	$config =null;
            }
            
                $dados = $controller->$action($id);//aki ele acesso o controlle no metodos
                if(!isset($dados['Rende'])){
                    ViewModel::render ( $pathView, $dados, $pg, $scripts,$config);// aki agente chama a classe q vai chamar as views   
                }
                else
                {
                    ViewModel::renderoff ( $pathView, $dados, $pg, $scripts,$config);// aki agente chama a classe q vai chamar as views                       
                    
                }
                
        }
       else
       {
                ViewModel::renderLogin();
                return;
                exit ();
       }
    }
}