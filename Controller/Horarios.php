<?php
namespace Controller;
use Controller\Date;
use Model\Entidades\HorariosEntidade;
use Model\Mappers\HorariosMapper;
use Model\Mappers\AtendentesMapper;
use Model\Mappers\Dia_sMapper;
 /**

 * Classe para controle de Horarios
 *
 * @author Edipo Ap. Wohlers
 * @version 2.0
 * @access public
 * @package Controller
 */


class Horarios extends Date

{
    private $HorariosEntidade;
    private $HorariosMapper;
    private $AtendentesMapper;
    private $Dia_sMapper;
    public $scripts;

    public function __construct()
    {
	$this->HorariosMapper = new HorariosMapper();
        $this->Dia_sMapper = new Dia_sMapper();
        $this->AtendentesMapper = new AtendentesMapper();
        
        $this->HorariosEntidade = new HorariosEntidade();
        
        $this->scripts="Tabela";
    }

    public function Index()
    {
    }
    public function Novo()
    {
        $campo="*";$where=""; $ordem="";$limit=""; $tipo="all";
        $dados['Atendentes']=  $this->AtendentesMapper->Listar($campo, $where, $ordem, $limit, $tipo);
        return $dados;
    }
    public function Editar($id)
    {
        $campo=" * "; $where=""; $ordem=""; $limit=""; $tipo="all";
        $dia_s = $this->Dia_sMapper->Listar($campo, $where, $ordem, $limit, $tipo);
        $atendentes =  $this->AtendentesMapper->Listar($campo, $where, $ordem, $limit, $tipo);
        
        $dados['Horario'] = $this->HorariosMapper->Buscar($id);
        $a = $this->AtendentesMapper->Buscar($dados['Horario']['atendente']);
        $d = $this->Dia_sMapper->Buscar($dados['Horario']['dia_s']);
        $dados['Horario']['atendente'] = $a;
        $dados['Horario']['dia_s'] = $d;
        $dados['Atendentes']=$atendentes;
        $dados['Dia_s']=$dia_s;
        
        return $dados;
    }
    public function Procurar()
	{
		if(isset($_POST['Token']))
		{
			if($_POST['Token'] == $_SESSION['User']['Token'])
			{
                            $proc ="hora like '%".$_POST['like']."%'";
                            $dados = $this->HorariosMapper->Procurar($proc);
                            $x=0;
                            foreach ($dados as $d)
                            {
                                $dados[$x]['Atendente'] = $this->AtendentesMapper->Buscar($d['Atendente']);
                                $dados[$x]['Dia_s'] = $this->Dia_sMapper->Buscar($d['Dia_s']);
                                $x++;
                            }
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

        				$this->HorariosEntidade->setAtendente($_POST['atendente']);
					$this->HorariosEntidade->setHora($_POST['hora']);
                                        $this->HorariosEntidade->setDia_s($_POST['dia_s']);

                                        
					if(isset($_POST['id']))
					{
						$this->HorariosEntidade->setId($_POST['id']);
					}
					$this->HorariosMapper->Salvar($this->HorariosEntidade);


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
            $this->HorariosMapper->Delete($condicoes);
            header("Location: /Horarios");  
        }
}