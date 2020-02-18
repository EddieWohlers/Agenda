<?php
namespace Controller;
use Controller\Date;
use Model\Entidades\AdmEntidade;
use Model\Mappers\AdmMapper;
 /**

 * Classe para controle de Administradores
 *
 * @author Edipo Ap. Wohlers
 * @version 2.0
 * @access public
 * @package Controller
 */


class Adm extends Date

{
    private $AdmEntidade;
    private $AdmMapper;
    public $scripts;

    public function __construct()
    {
	$this->AdmMapper = new AdmMapper();
        
        $this->AdmEntidade = new AdmEntidade();
    }

    public function Index()
    {
    }
    public function Novo()
    {
        
    }
    public function Editar($id)
    {
        $dados = $this->AdmMapper->Buscar($id);
        
        return $dados;
    }
    public function Procurar()
	{
		if(isset($_POST['Token']))
		{
			if($_POST['Token'] == $_SESSION['User']['Token'])
			{
                            $proc ="nome like '%".$_POST['like']."%'";

                            $dados = $this->AdmMapper->Procurar($proc);
                            
                            return $dados;
			}
		}


	}
     public function Salvar()
	{
		if(isset($_POST['Token']))
		{
			if($_POST['Token'] == $_SESSION['User']['Token'])
			{
				try
				{
				
					
        				$this->AdmEntidade->setNome($_POST['nome']);
					$this->AdmEntidade->setEmail($_POST['email']);
                                        $this->AdmEntidade->setTelefone($_POST['telefone']);
                                        $this->AdmEntidade->setLogin($_POST['login']);
                                        $this->AdmEntidade->setSenha($_POST['senha']);
                                        
					if(isset($_POST['id']))
					{
						$this->AdmEntidade->setId($_POST['id']);
					}
                                            
					$this->AdmMapper->Salvar($this->AdmEntidade);


				}
				catch (\PDOException $e)
				{
					echo"<pre>";
                                        print_r($e);
                                        echo"<pre>";
				}
			}
		}
	}   

        public function Excluir($id)
        {
            $this->Email("excluiu, $id");
            $condicoes = "where id='$id'";
            $this->AdmMapper->Delete($condicoes);
            header("Location: /Adm");  
        }
}