<?php
namespace Lib\DB;
class Banco_Factory
{
    private static $db;
    
    public static function criar($banco)
    {
        $banco_agenda = "Banco_Agenda";
        switch ($banco)
        {    
            case $banco_agenda:
                $db =new Banco_Agenda;
            break;    
                
        }
        
        self::$db =$db->conectar();
        
        return self::$db;
    }
    public static function criar_adm()
    {
        $db_adm =new Banco_Adm();
    	self::$db =$db_adm->conectar();
    	
    	return self::$db;
    }
}