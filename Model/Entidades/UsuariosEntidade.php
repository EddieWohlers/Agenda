<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Model\Entidades;

class UsuariosEntidade
{
    private $nome;
    private $senha;
    private $email;
    private $ativo;
    private $banco;
    private $empresa;
    
    public function getNome() {
        return $this->nome;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAtivo() {
        return $this->ativo;
    }

    public function getBanco() {
        return $this->banco;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    public function setBanco($banco) {
        $this->banco = $banco;
    }

    public function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }


}

