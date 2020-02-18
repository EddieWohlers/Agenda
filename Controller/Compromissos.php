<?php
namespace Controller;
use Controller\Date;
use Model\Entidades\CompromissosEntidade;
use Model\Mappers\CompromissosMapper;
use Model\Mappers\AdmMapper;
 /**

 * Classe para controle de Administradores
 *
 * @author Edipo Ap. Wohlers
 * @version 2.0
 * @access public
 * @package Controller
 */


class Compromissos extends Date

{
    private $CompromissosEntidade;
    private $CompromissosMapper;
    private $AdmMapper;
    public $scripts;

    public function __construct()
    {
	$this->CompromissosMapper = new CompromissosMapper();
        $this->AdmMapper = new AdmMapper();
        $this->CompromissosEntidade = new CompromissosEntidade();
    }

    public function Index()
    {
    }
    public function Novo()
    {
    }
    public function Editar($id)
    {
        $dados = $this->CompromissosMapper->Buscar($id);
        
        return $dados;
    }
    public function Procurar()
	{
		if(isset($_POST['Token']))
		{
			if($_POST['Token'] == $_SESSION['User']['Token'])
			{
                            $proc ="titulo like '%".$_POST['like']."%'";

                            $dados = $this->CompromissosMapper->Procurar($proc);
                            
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
				
        				$this->CompromissosEntidade->setTitulo($_POST['titulo']);
                                        $this->CompromissosEntidade->setData($_POST['data']);
                                        $this->CompromissosEntidade->setHoraini($_POST['horaini']);
                                        $this->CompromissosEntidade->setHorafim($_POST['horafim']);
                                        $this->CompromissosEntidade->setCidade($_POST['cidade']);
                                        $this->CompromissosEntidade->setEstado($_POST['estado']);
                                        $this->CompromissosEntidade->setTipo($_POST['tipo']);
                                        $this->CompromissosEntidade->setLocal($_POST['local']);
                                        $this->CompromissosEntidade->setForma_pag($_POST['forma_pag']);
                                        $this->CompromissosEntidade->setArtista($_POST['artista']);
                                        $this->CompromissosEntidade->setCategoria($_POST['categoria']);
                                        $this->CompromissosEntidade->setStatus($_POST['status']);
                                        $this->CompromissosEntidade->setDestaque($_POST['destaque']);
	
					if(isset($_POST['id']))
					{
						$this->CompromissosEntidade->setId($_POST['id']);
					}
                                        
					$this->CompromissosMapper->Salvar($this->CompromissosEntidade);
                                        
                                        if(isset($_POST['id']))
                                        {
                                            $id = $_POST['id'];
                                            $tipo = "editou";
                                        }
                                        else
                                        {
                                            $campo="id"; $where="";$ordem="order by id desc"; $limit="limit 1";$tipo="";
                                            $id = $this->CompromissosMapper->Listar($campo, $where, $ordem, $limit, $tipo);
                                            $tipo="adicionou";
                                        }
                                        $this->Email($tipo, $id['id']);
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
            $this->Email("excluiu", $id);
            $condicoes = "where id='$id'";
            $this->CompromissosMapper->Delete($condicoes);
            header("Location: /Compromissos");  
        }
        public function Email($tipo,$id)
        {
                    $campo="email";
            $where="";
            $ordem="";
            $limit="";
            $t="all";
            $destino = $this->AdmMapper->Listar($campo, $where, $ordem, $limit, $t);
            
            $assunto = $_SESSION['User']['Nome']." $tipo um compromisso ";
            $comp = $this->CompromissosMapper->Buscar($id);
            $arquivo = $this->EmailArquivo($comp);
            
            foreach ($destino as $d)
            {
                $this->CompromissosMapper->EnviarEmail($assunto, $d['email'], $arquivo);
            }
        }
    public function EmailArquivo($comp)//monta o arquivo de email
        {
            $m ="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns:v='urn:schemas-microsoft-com:vml'>

<head>
 <meta http-equiv='Content-Type' content='text/html;charset=UTF-8'> 
    <meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=1.0;' />
    <meta name='viewport' content='width=600,initial-scale = 2.3,user-scalable=no'>

    <title>Agenda de Compromisso</title>

</head>


<body leftmargin=0' topmargin='0' marginwidth='0' marginheight='0'>
   
    <table border='0' style='width:100%; border-bottom-style: solid; border-color:#337ab7; padding: 20px;' cellpadding='20' cellspacing='5'>
        <tr style='border-color:#337ab7'>
            <td  style='background-color: #337ab7; padding: 20px;color:#fff' align='center'><b>Local </b></td>
        </tr>
        <tr>
            <td style='width:50%; border-style: solid; border-color:#337ab7; padding: 20px;'>
                <p><b>Cidade: </b>".$comp['cidade']."</p> <br>
                <p><b>Estado: </b>".$comp['estado']."</p>
                <p><b>Local: </b>".$comp['local']."</p>
            </td>
        </tr>
        <tr style='border-color:#337ab7'>
            <td  style='background-color: #337ab7; padding: 20px;color:#fff' align='center'><b>Show </b></td>
        </tr>
        <tr>
            <td style='width:50%; border-style: solid; border-color:#337ab7; padding: 20px;'>
                <p><b>Titulo: </b>".$comp['titulo']."</p>
                <p><b>Tipo de Show: </b>".$comp['tipo']."</p>
                <p><b>Artista: </b>".$comp['artista']."</p>
                <p><b>Categoria: </b>".$comp['categoria']."</p>
            </td>
        </tr>
        <tr style='border-color:#337ab7'>
            <td  style='background-color: #337ab7; padding: 20px;color:#fff' align='center'><b>Data </b></td>
        </tr>
        <tr>
            <td style='width:50%; border-style: solid; border-color:#337ab7; padding: 20px;'>
                <p><b>Data: </b>".$comp['data']."</p>
                <p><b>Hora de Inicio: </b>".$comp['horaini']."</p>
                <p><b>Hora de termino: </b>".$comp['horafim']."</p>

            </td>
        </tr>
        <tr style='border-color:#337ab7'>
            <td  style='background-color: #337ab7; padding: 20px;color:#fff' align='center'><b>Financeiro </b></td>
        </tr>
        <tr>
            <td style='width:50%; border-style: solid; border-color:#337ab7; padding: 20px;'>
                <p><b>Status: </b>".$comp['status']."</p>
                <p><b>Forma de pagamento: </b>".$comp['forma_pag']."</p>
                <p><b>Destaque: </b>".$comp['destaque']."</p>

            </td>            
        <tr>
        </tbody></table></body></html>";
                   
                   
             return $m;
        
                                }
        public function Ver()
        {
            $campo="*";$where=""; $ordem=""; $limit=""; $tipo="all";
            return $this->CompromissosMapper->Listar($campo, $where, $ordem, $limit, $tipo);
                    
        }          
        }
        