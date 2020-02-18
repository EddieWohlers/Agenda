<?php
namespace Model\Mappers;
abstract class MapperPadrao
{
    public function Listar($campo, $where, $ordem, $limit,$tipo )
        {
        
        if(!isset($tipo))
        {
            $tipo="";
        }
        if(!isset($campo))
    	{
    		$campo="";
    	}
    	if(!isset($where))
    	{
    		$where="";
    	}
    	if(!isset($ordem))
    	{
    		$ordem="";
    	}
    	if(!isset($limit))
    	{
    		$limit="";
    	} 

       return  $this->tableGateway->listar($campo, $where, $ordem, $limit,$tipo);
    } 
    public function Buscar($id)
    {
    	$where =" WHERE id = '$id' ";

        return $this->tableGateway->Buscar($where);
    }

	public function Delete($condicoes)
	{
		return $this->tableGateway->Delete($condicoes);
	}

    public function EnviarEmail($assunto, $destino,$arquivo)
    {
  
  // É necessário indicar que o formato do e-mail é html
     $cco="";   
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= "From: Agenda <sgm@netphp.com.br>, $cco" ;
   
  $enviaremail = mail($destino, $assunto, $arquivo, $headers);
    }
  }