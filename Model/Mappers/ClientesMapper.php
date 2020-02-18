<?php

namespace Model\Mappers;
use Lib\DB\TableGateway;

class ClientesMapper extends MapperPadrao    
{
    protected $tableGateway;

    public function __construct()
    {
        $this->tableGateway = new TableGateway("cliente");

    }
    public function Salvar($clientes)
    {
        $dados=[
                    'nome'     => $clientes->GetNome(),
                    'telefone' => $clientes->GetTelefone(),
                    'email'    => $clientes->GetEmail()
                    
		];
        
    	if($clientes->GetId() == null)
		{
			$this->tableGateway->Inserir($dados);
		}
		else
		{
			$this->tableGateway->Alterar($dados, $clientes->GetId());
		}
    }
    public function Procurar($like)
	{           
        
            $campo =" id as 'ID'";       
            $campo .=" ,nome as 'Nome'";
            $campo .=" ,email as 'Email'";
            $campo .=" ,telefone as 'Telefone'";
            
            return $this->tableGateway->Procurar($like,$campo);
	}

}