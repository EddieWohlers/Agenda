<?php

namespace Model\Mappers;
use Lib\DB\TableGateway;

class Dia_sMapper extends MapperPadrao    
{
    protected $tableGateway;

    public function __construct()
    {
        $this->tableGateway = new TableGateway("dia_s");

    }

    public function Procurar($like)
	{           
        
            $campo =" id as 'ID'";       
            $campo .=" ,Dia_s'";
            
            return $this->tableGateway->Procurar($like,$campo);
	}

}