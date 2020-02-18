<?php

namespace Model\Mappers;
use Lib\DB\TableGateway;

class AgendaMapper extends MapperPadrao    
{
    protected $tableGateway;

    public function __construct()
    {
        $this->tableGateway = new TableGateway("agenda");

    }
    public function Salvar($agenda)
    {
        $dados=[
                    'atendente'    => $agenda->GetAtendente(),
                    'cliente'     => $agenda->GetCliente(),
                    'data' => $agenda->GetData(),
                    'status'    => $agenda->GetStatus(),
                    'horario'    => $agenda->GetHorario()
                    
		];
        
    	if($agenda->GetId() == null)
		{
			$this->tableGateway->Inserir($dados);
		}
		else
		{
			$this->tableGateway->Alterar($dados, $agenda->GetId());
		}
    }
}