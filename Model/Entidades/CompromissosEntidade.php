<?php 
namespace Model\Entidades;

class CompromissosEntidade
{
	private $id;
        private $titulo;
	private $data;
        private $horaini;
        private $horafim;
        private $cidade;
        private $estado;
        private $tipo;
        private $local;
        private $forma_pag;
        private $artista;
        private $categoria;
        private $status;
        private $destaque;
        
	public $encoding;
	public function __construct()
	{
		$this->encoding = mb_internal_encoding();
	}
        public function getId() {
            return $this->id;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function getData() {
            return $this->data;
        }

        public function getHoraini() {
            return $this->horaini;
        }

        public function getHorafim() {
            return $this->horafim;
        }

        public function getCidade() {
            return $this->cidade;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function getTipo() {
            return $this->tipo;
        }

        public function getLocal() {
            return $this->local;
        }

        public function getForma_pag() {
            return $this->forma_pag;
        }

        public function getArtista() {
            return $this->artista;
        }

        public function getCategoria() {
            return $this->categoria;
        }

        public function getStatus() {
            return $this->status;
        }

        public function getDestaque() {
            return $this->destaque;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setTitulo($titulo) {
            $this->titulo = mb_strtoupper( $titulo, $this->encoding);
        }

        public function setData($data) {
            $this->data = $data;
        }

        public function setHoraini($horaini) {
            $this->horaini = $horaini;
        }

        public function setHorafim($horafim) {
            $this->horafim = $horafim;
        }

        public function setCidade($cidade) {
            $this->cidade = mb_strtoupper( $cidade, $this->encoding);
        }

        public function setEstado($estado) {
            $this->estado = mb_strtoupper( $estado, $this->encoding);
        }

        public function setTipo($tipo) {
            $this->tipo = mb_strtoupper( $tipo, $this->encoding);
        }

        public function setLocal($local) {
            $this->local = mb_strtoupper( $local, $this->encoding);
        }

        public function setForma_pag($forma_pag) {
            $this->forma_pag = mb_strtoupper( $forma_pag, $this->encoding);
        }

        public function setArtista($artista) {
            $this->artista = mb_strtoupper( $artista, $this->encoding);
        }

        public function setCategoria($categoria) {
            $this->categoria = mb_strtoupper( $categoria, $this->encoding);
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function setDestaque($destaque) {
		$this->destaque = mb_strtoupper( $destaque, $this->encoding);
        }


        }