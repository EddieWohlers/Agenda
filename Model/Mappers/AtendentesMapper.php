<?php

namespace Model\Mappers;
use Lib\DB\TableGateway;

class AtendentesMapper extends MapperPadrao    
{
    protected $tableGateway;

    public function __construct()
    {
        $this->tableGateway = new TableGateway("atendentes");

    }
    public function Salvar($atendentes)
    {
        $dados=[
                    'qtddia'    => $atendentes->GetQtdDia(),
                    'nome'     => $atendentes->GetNome(),
                    'telefone' => $atendentes->GetTelefone(),
                    'email'    => $atendentes->GetEmail()
                    
		];
        
    	if($atendentes->GetId() == null)
		{
			$this->tableGateway->Inserir($dados);
		}
		else
		{
			$this->tableGateway->Alterar($dados, $atendentes->GetId());
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