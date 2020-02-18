<?php 
namespace Model\Entidades;

class HorariosEntidade
{
	private $id;
        private $atendente;
	private $hora;
        private $dia_s;
        
        public function getDia_s() {
            return $this->dia_s;
        }

        public function setDia_s($dia_s) {
            $this->dia_s = $dia_s;
        }

                public function getId() {
            return $this->id;
        }

        public function getAtendente() {
            return $this->atendente;
        }

        public function getHora() {
            return $this->hora;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setAtendente($atendente) {
            $this->atendente = $atendente;
        }

        public function setHora($hora) {
            $this->hora = $hora;
        }


        }