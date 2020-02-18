<?php

namespace Model\Mappers;
use Lib\DB\TableGateway;

class UsuariosMapper
{
    protected $tableGateway;

    public function __construct()
    {
        $this->tableGateway = new TableGateway("usuarios");

    }
    public function Login($nome, $senha)
    {
        return $this->tableGateway->Login($nome, $senha);
    }
}