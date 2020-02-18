<?php

namespace Model\Mappers;
use Lib\DB\TableGateway;

class HorariosMapper extends MapperPadrao    
{
    protected $tableGateway;

    public function __construct()
    {
        $this->tableGateway = new TableGateway("horarios");

    }
    public function Salvar($horarios)
    {
        $dados=[
                    'atendente'     => $horarios->GetAtendente(),
                    'hora' => $horarios->GetHora(),
                    'dia_s' => $horarios->GetDia_s()
		];
        
    	if($horarios->GetId() == null)
		{
			$this->tableGateway->Inserir($dados);
		}
		else
		{
			$this->tableGateway->Alterar($dados, $horarios->GetId());
		}
    }
    public function Procurar($like)
	{           
        
            $campo =" id as 'ID'";       
            $campo .=" ,hora as 'Hora'";
            $campo .=" ,dia_s as 'Dia_s'";
            $campo .=" ,atendente as 'Atendente'";
            
            return $this->tableGateway->Procurar($like,$campo);
	}

}