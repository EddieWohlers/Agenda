<?php
namespace Controller;
use Controller\Date;
use Model\Entidades\AgendaEntidade;
use Model\Mappers\AgendaMapper;
use Model\Mappers\AtendentesMapper;
use Model\Mappers\ClientesMapper;
use Model\Mappers\HorariosMapper;
 /**

 * Classe para controle de Agenda
 *
 * @author Edipo Ap. Wohlers
 * @version 2.0
 * @access public
 * @package Controller
 */


class Agenda extends Date

{
    private $AgendaEntidade;
    private $AgendaMapper;
    private $AtendentesMapper;
    private $ClientesMapper;
    private $HorariosMapper;
    
    public $scripts;

    public function __construct()
    {
	$this->AgendaMapper = new AgendaMapper();
        $this->AtendentesMapper = new AtendentesMapper();
        $this->ClientesMapper = new ClientesMapper();
        $this->HorariosMapper = new HorariosMapper();
        $this->AgendaEntidade = new AgendaEntidade();
        $this->scripts = "Agenda/Horarios,Agenda/Clientes";
    }
    
    
    public function Abrir($id)
    {
        if(isset($_POST['mes']))
        {    
            $dados['Data'] = $_POST['ano']."-".$_POST['mes'];
        }
        else
        {
            $dados['Data'] = $this->Data();
        }
        $dados['Atendente'] = $this->AtendentesMapper->Buscar($id);//puxa o atendente 
        $campo="*"; 
        
        $where=" where atendente ='".$dados['Atendente']['id']."'"; 
        $ordem=""; $limit=""; $tipo="all";
        $dados['Horarios'] = $this->HorariosMapper->Listar($campo, $where, $ordem, $limit, $tipo);
        
        
        $d = explode("-", $dados['Data']);//separa dia,mes,ano
        $dados['DiasMes'] = $this->DiasMes($d[1],$d[0]);//quantos dias tem o mes
        $dados['DiaSemana'] = $this->DiaSemana($d[0]."-".$d[1]);//dia da semana que começa o mes
        $m = date('m', strtotime($dados['Data']));//o mes
        $i=0;
        
        $campo=" * ";
        $where =" where atendente='".$dados['Atendente']['id']."' and month(data)='$m' and status='Agendado'";
        $ordem=" order by day(data) asc ";
        $limit="";
        $tipo="all";
        $dados['Agenda'] = $this->AgendaMapper->Listar($campo, $where, $ordem, $limit, $tipo);
        
        
        $x=0;
        foreach ($dados['Agenda'] as $comp)
        {
            unset($dados['Agenda'][$x]['data']);
            $data = explode(" ",$comp['data']);
            $data = explode("-",$data[0]);
        
            $dados['Agenda'][$x]['dia'] = $data[2];
            $dados['Agenda'][$x]['mes'] = $data[1];
            $dados['Agenda'][$x]['ano'] = $data[0];
        
         $x++;   
        }
        
        

        $campo="*";$where="";$ordem="";$limit="";$tipo="all";
        $dados['Clientes'] = $this->ClientesMapper->Listar($campo, $where, $ordem, $limit, $tipo);

                
        return $dados;
    }
    public function Horarios()
        {
            if(isset($_POST))
            {
                $data = $_POST['ano']."-".$_POST['mes']."-".$_POST['dia'];
                $dados['Data'] = $data;
                $campo="*";        
                $where=" where atendente='".$_POST['atendente']."' and dia_s='".$_POST['dia_s']."'";
                $ordem=""; 
                $limit="";
                $tipo="all";
                $dados['Horarios'] = $this->HorariosMapper->Listar($campo, $where, $ordem, $limit, $tipo);
                              
                $x=0;
                foreach($dados['Horarios'] as $h)
                {
                    $where=" where horario='".$h['id']."' and status='Agendado' and data='".$dados['Data']."'";
                    $tipo="";
                    $a = $this->AgendaMapper->Listar($campo, $where, $ordem, $limit, $tipo);
                    
                    if($a){
                        
                      
                    $c = $this->ClientesMapper->Buscar($a['cliente']);    
                    $dados['Horarios'][$x]['Agendado'] = $a;
                    $dados['Horarios'][$x]['Agendado']['cliente']=$c;
                    unset($a);
                    }
                   
                    $x++;
                }
                $dados['Rende']='off';
                
            }
            
        return $dados;
    }
    public function Index()
    {
    }
    public function Novo()
    {
        
    }
    public function Editar($id)
    {
        $dados = $this->AgendaMapper->Buscar($id);
        
        return $dados;
    }
    public function Salvar()
    {
		if(isset($_POST['Token']))
		{
                                              
			if($_POST['Token'] == $_SESSION['User']['Token'])
			{
                                                    
				try
				{
				                          
					if(isset($_POST['atendente'])){ $this->AgendaEntidade->setAtendente($_POST['atendente']);}
                                        if(isset($_POST['cliente'])){ $this->AgendaEntidade->setCliente($_POST['cliente']);}
                                        if(isset($_POST['data'])){ $this->AgendaEntidade->setData($_POST['data']);}
                                        if(isset($_POST['status'])){ $this->AgendaEntidade->setStatus($_POST['status']);}
                                        if(isset($_POST['horario'])){ $this->AgendaEntidade->setHorario($_POST['horario']);}
                                        
					if(isset($_POST['id']))
					{
						$this->AgendaEntidade->setId($_POST['id']);
					}

					$this->AgendaMapper->Salvar($this->AgendaEntidade);


				}
				catch (\PDOException $e)
				{
					echo"<pre>";
                                        print_r($e);
                                        echo"<pre>";
				}
                                finally
                                {
                                    header("Location: /Agenda/Abrir/".$_POST['atendente']);
                                }
			}
		}
	}   
    public function Excluir($id)
    {
            $condicoes = "where id='$id'";
            $this->AgendaMapper->Delete($condicoes);
            header("Location: /Agenda");  
        }
}