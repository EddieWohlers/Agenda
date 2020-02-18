<?php 
namespace Model\Entidades;

class AgendaEntidade
{
	private $id;
        private $atendente;
	private $cliente;
        private $status;
        private $data;
        private $horario;

	public $encoding;
	public function __construct()
	{
		$this->encoding = mb_internal_encoding();
	}
        public function getHorario() {
            return $this->horario;
        }

        public function setHorario($horario) {
            $this->horario = $horario;
        }

                public function getId() {
            return $this->id;
        }

        public function getAtendente() {
            return $this->atendente;
        }

        public function getCliente() {
            return $this->cliente;
        }

        public function getStatus() {
            return $this->status;
        }

        public function getData() {
            return $this->data;
        }

        public function getEncoding() {
            return $this->encoding;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setAtendente($atendente) {
            $this->atendente = $atendente;
        }

        public function setCliente($cliente) {
            $this->cliente = $cliente;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function setData($data) {
            $this->data = $data;
        }

        public function setEncoding($encoding) {
            $this->encoding = $encoding;
        }

   
        }