<?php 
namespace Model\Entidades;

class AtendentesEntidade
{
	private $id;
        private $nome;
	private $telefone;
        private $email;
        private $qtddia;

	public $encoding;
	public function __construct()
	{
		$this->encoding = mb_internal_encoding();
	}
        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function getQtdDia() {
            return $this->qtddia;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        public function setQtdDia($qtddia) {
            $this->qtddia = $qtddia;
        }

        public function setEmail($email) {
            $this->email = $email;
        }


        
        }