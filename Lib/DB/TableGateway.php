<?php
namespace Lib\DB;

class TableGateway
{
    private $tabela;
    private $conn;
        public function __construct($tabela)
    {
        $this->tabela = $tabela;
        
        if($this->tabela == "usuarios")
        {
            $this->conn = Banco_Factory::criar_adm();
        }
        else
        {
            if(isset($_SESSION['User'])) 
            {
                $this->banco = $_SESSION['User']['Banco'];
                $this->conn = Banco_Factory::criar($this->banco);
            }
            else
            {
                $this->tabela="usuarios";    
                $this->conn = Banco_Factory::criar_adm();
            }
        }

    }
    public function Login($nome, $senha)
    {
        $sql = "SELECT * FROM $this->tabela WHERE NOME='$nome' and SENHA ='$senha' and Ativo='1'";
       echo"<br>$sql<br>";
 
        if($pdo = $this->conn->query($sql))
        {
            
             return $pdo->fetch(\PDO::FETCH_ASSOC);
        }
    }
    public function BuscaCPFCNPJ($cpfcnpj)
    {
        $sql = "SELECT * FROM $this->tabela WHERE cpf_cnpj='$cpfcnpj' ";
 //         echo"<br>$sql<br>";
 
        if($pdo = $this->conn->query($sql))
        {
             return $pdo->fetch(\PDO::FETCH_ASSOC);
        }
    }
    public function Procurar($like,$campos)
    {
    	$sql = "SELECT $campos from $this->tabela  WHERE  ( $like )";
       //echo"$sql";
    	if($pdo = $this->conn->query($sql))
    	{
    		$dados= $pdo->fetchAll(\PDO::FETCH_ASSOC);
    	}
    	return $dados;

    }
    public function Buscar($where)
    {
    	$sql = "SELECT * FROM $this->tabela $where";
    	//echo" sql $sql<br>";
    	if($pdo = $this->conn->query($sql))
    		{
    			return $pdo->fetch(\PDO::FETCH_ASSOC);
    		}
    }
    public function Alterar(array $dados, $id)
    {
    	// logica para montar o update
    	foreach ($dados as $campo => $valor)
    	{
          if(!empty($valor)){
    		$sets[] = "$campo='$valor'";
          }
    	}
    	$sets = implode(',', $sets);
        
    	$update = "UPDATE $this->tabela SET $sets WHERE id = $id";
	// echo $update;
         //sexit();
    	return $this->conn->query($update);
    }
    public function Inserir($dados)
    {

    	foreach ($dados as $campo => $valor)
    	{
    		$campos[] = $campo;
    		$valores[]= "'$valor'";
    	}
    	$campos  = implode(',', $campos);
    	$valores = implode(',', $valores);

    	$insert = "INSERT INTO {$this->tabela}($campos)VALUES($valores)";
    //echo $insert;	
    	return $this->conn->query($insert);

    }
    public function Listar($campo, $where, $ordem, $limit,$tipo ) 
    {

    	//echo"where = $where<br>";
        $sql = "SELECT $campo FROM $this->tabela $where $ordem $limit";
        //echo" sql $sql<br>";

            
        if($pdo = $this->conn->query($sql))
        {
            
                if($tipo=="all")
                {
                    return $pdo->fetchAll(\PDO::FETCH_ASSOC);
                }
                else 
                {
                    return $pdo->fetch(\PDO::FETCH_ASSOC);
                }
        }
    } 
    public function Delete($condicoes)
    {
		$delete = "DELETE FROM {$this->tabela} $condicoes";
		echo"<pre>";
     
		print_r($delete);
			return $this->conn->query($delete);
	}
    public function ListarConfigForm($where)
    {
        $sql = "SELECT * FROM configuracoes_form $where";
//        echo" sql $sql<br>"; 
        if($pdo = $this->conn->query($sql))
        {
            return $pdo->fetch(\PDO::FETCH_ASSOC);
        }
    }
}

