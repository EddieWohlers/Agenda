<?php
namespace Controller;
/**
 *
 *
 * Classe para controles de datas e horas *
 * @author Edipo Ap. Wohlers
 * @version 0.1
 * @access Abstract
 * @package Controller
 * */
abstract class Date
{
    public $hoje;
    public $data;
    public $inicio;
	public function Hoje()
	{
	    $this->hoje = new \DateTime("America/Sao_Paulo");
	    $hj = $this->hoje->format('Y-m-d H:i:s');
		return $hj;
	}
        public function Data()
	{
	    $this->data = new \DateTime("America/Sao_Paulo");
	    $hj = $this->data->format('Y-m');
		return $hj;
	}

 	public function ControleSession($datalogin)
 	{
 	    $datalogin = date('d-m-Y H:i:s', strtotime($datalogin));
 	    $hj  = $this->Hoje();
 	    $hj = date('d-m-Y H:i:s', strtotime($hj));
 	    $dif = strtotime($hj)- strtotime($datalogin);
 	    return $dif;
 	}
        
         public function DiasMes($mes,$ano)
         {
             return $numero = cal_days_in_month(CAL_GREGORIAN, $mes, $ano); // 31
             
         }
         public function DiaSemana($data)
         {
         
             return $diasemana = date('w',  strtotime($data));
         }

}