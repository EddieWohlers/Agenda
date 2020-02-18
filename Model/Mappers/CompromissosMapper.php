<?php

namespace Model\Mappers;
use Lib\DB\TableGateway;

class CompromissosMapper extends MapperPadrao    
{
    protected $tableGateway;

    public function __construct()
    {
        $this->tableGateway = new TableGateway("compromissos");

    }

    public function Salvar($comp)
    {
        $dados=[
                    'titulo'    => $comp-> GetTitulo(),
                    'data'      => $comp-> GetData(),
                    'horaini'   => $comp-> GetHoraini(),
                    'horafim'   => $comp-> GetHorafim(),
                    'cidade'    => $comp-> GetCidade(),
                    'estado'    => $comp-> GetEstado(),
                    'tipo'      => $comp-> GetTipo(),
                    'local'     => $comp-> GetLocal(),
                    'forma_pag' => $comp-> GetForma_pag(),
                    'artista'   => $comp-> GetArtista(),
                    'categoria' => $comp-> GetCategoria(),
                    'status'    => $comp-> GetStatus(),
                    'destaque'  => $comp-> GetDestaque()
                    
		];
        
    	if($comp->GetId() == null)
		{
			$this->tableGateway->Inserir($dados);
		}
		else
		{
			$this->tableGateway->Alterar($dados, $comp->GetId());
		}
    }
    public function Procurar($like)
	{           
        
            $campo ="titulo as 'Titulo', id as 'ID'";        
            
            return $this->tableGateway->Procurar($like,$campo);
	}

}