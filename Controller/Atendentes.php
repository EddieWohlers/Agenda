<?php
namespace Controller;
use Controller\Date;
use Model\Entidades\AtendentesEntidade;
use Model\Mappers\AtendentesMapper;
 /**

 * Classe para controle de Atendentes
 *
 * @author Edipo Ap. Wohlers
 * @version 2.0
 * @access public
 * @package Controller
 */


class Atendentes extends Date

{
    private $AtendentesEntidade;
    private $AtendentesMapper;
    public $scripts;

    public function __construct()
    {
	$this->AtendentesMapper = new AtendentesMapper();
        
        $this->AtendentesEntidade = new AtendentesEntidade();
    }

    public function Index()
    {
    }
    public function Novo()
    {
        
    }
    public function Editar($id)
    {
        $dados = $this->AtendentesMapper->Buscar($id);
        
        return $dados;
    }
    public function Procurar()
	{
		if(isset($_POST['Token']))
		{
			if($_POST['Token'] == $_SESSION['User']['Token'])
			{
                            $proc ="nome like '%".$_POST['like']."%'";
                            $proc .=" or email like '%".$_POST['like']."%'";
                            $proc .=" or telefone like '%".$_POST['like']."%'";

                            $dados = $this->AtendentesMapper->Procurar($proc);
                            
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
				
					
        				$this->AtendentesEntidade->setNome($_POST['nome']);
					$this->AtendentesEntidade->setEmail($_POST['email']);
                                        $this->AtendentesEntidade->setTelefone($_POST['telefone']);
                                        $this->AtendentesEntidade->setQtdDia($_POST['qtddia']);
                                        
					if(isset($_POST['id']))
					{
						$this->AtendentesEntidade->setId($_POST['id']);
					}
                                            
					$this->AtendentesMapper->Salvar($this->AtendentesEntidade);


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
            $condicoes = "where id='$id'";
            $this->AtendentesMapper->Delete($condicoes);
            header("Location: /Atendentes");  
        }
}