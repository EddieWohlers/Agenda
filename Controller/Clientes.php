<?php
namespace Controller;
use Controller\Date;
use Model\Entidades\ClientesEntidade;
use Model\Mappers\ClientesMapper;
 /**

 * Classe para controle de Atendentes
 *
 * @author Edipo Ap. Wohlers
 * @version 2.0
 * @access public
 * @package Controller
 */


class Clientes extends Date

{
    private $ClientesEntidade;
    private $ClientesMapper;
    public $scripts;

    public function __construct()
    {
	$this->ClientesMapper = new ClientesMapper();
        
        $this->ClientesEntidade = new ClientesEntidade();
    }

    public function Index()
    {
    }
    public function Novo()
    {
        
    }
    public function Editar($id)
    {
        $dados = $this->ClientesMapper->Buscar($id);
        
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

                            $dados = $this->ClientesMapper->Procurar($proc);
                            
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
        				$this->ClientesEntidade->setNome($_POST['nome']);
					$this->ClientesEntidade->setEmail($_POST['email']);
                                        $this->ClientesEntidade->setTelefone($_POST['telefone']);
                                        
					if(isset($_POST['id']))
					{
						$this->ClientesEntidade->setId($_POST['id']);
					}
                                            
					$this->ClientesMapper->Salvar($this->ClientesEntidade);


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
            $this->ClientesMapper->Delete($condicoes);
            header("Location: /Atendentes");  
        }
}