<?php 

function autoload($classe)
{
    $classe = str_replace('\\', '/', $classe);
    $path = "$classe";
    $classe = "../$classe.php";
 
    if(file_exists($classe))
        {
          require $classe;
        }
       else
       {
       			echo"<br>Ops! Pagina não encontrada!<br>";
       			echo"<pre>Classe<br>";
       			print_r($classe);
       			echo"</pre>";

       }
}
/**
 * spl autoload
 */
spl_autoload_register('autoload');