<?php
namespace Controller;
use Controller\Date;
use Model\Entidades\UsuariosEntidade;
use Model\Mappers\UsuariosMapper;
 /**

 * Classe para controle de Login
 *
 * @author Edipo Ap. Wohlers
 * @version 2.0
 * @access public
 * @package Controller
 */


class Login extends Date

{
//    private $BancoMapper;
    private $UsuariosEntidade;
    private $UsuariosMapper;
    public $scripts;

    public function __construct()
    {
	$this->UsuariosMapper = new UsuariosMapper();
        
        $this->UsuariosEntidade = new UsuariosEntidade();
        $this->scripts="/Login/VerificaSenha";
    }

    public function Index()
    {
    }
    public function Sair()
    {
        if(isset($_SESSION['User']))
        {
            unset($_SESSION['User']);
            header("Location: /");
        }
    }

    public function Verificar()
        {
        
            if(empty($_POST['nome']))
                {

                    header("location: /");
                }
             else{

                    $nome = $_POST['nome'];
                    $nome = str_replace("'","", $nome);
                    $nome = str_replace(";","", $nome);
                    $nome = str_replace(",","", $nome);
                    $nome = str_replace('"','', $nome);
                    $nome = mb_strtoupper($nome);
                    $senha = $_POST['senha'];
                    $senha = str_replace("'","", $senha);
                    $senha = str_replace(";","", $senha);
                    $senha = str_replace(",","", $senha);
                    $senha = str_replace('"','', $senha);
                    $senha = mb_strtoupper($senha);

                    if($login = $this->UsuariosMapper->Login($nome,$senha))
                        {

                            $token = $login['nome'];
                            $token .= rand();
                            $hoje = $this->Hoje();
                                $_SESSION['User'] = array(
                                      'Id'          => $login['id'],
                                      'Nome' 	    => $login['nome'],
                                      'Data_Login'  =>  $hoje,
                                      'Token'       =>$token,
                                      'Email'       =>$login['email'],
                                      'Telefone'    =>$login['telefone'],
                                      'Banco'       =>$login['banco']
                                    );
                                
                        }
                }
                header("Location: /Index/Index");
        }
   
}