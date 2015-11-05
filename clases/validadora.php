<?php
//session_start();
class validadora
{

	public static function validarLogin($usuario,$clave,$recordar)
	{
		/*$usuario=$_POST['usuario'];
		$clave=$_POST['clave'];*/
		//$recordar=$_POST['recordarme'];	

		//$retorno;

	if($usuario=="octavio@admin.com.ar" && $clave=="1234")
		{			
		if($recordar=="true")
		{
			setcookie("registro",$usuario,  time()+36000 , '/');
		}else
		{
			setcookie("registro",$usuario,  time()-36000 , '/');
		}
			$_SESSION['registrado']="octavio";
			$_SESSION['tiempo']=date("Y-m-d H:i:s");
			//$retorno=" ingreso";
			return true;
	}else
	{
		//$retorno= "No-esta";
		return false;
	}

		//echo $retorno;
	}//validarLogin

	public static function validarSesionActual()
	{
		if(isset($_SESSION['registrado']))
		{
			$segundos=strtotime(date("Y-m-d H:i:s")) - strtotime($_SESSION['tiempo']);

			if($segundos <=5)
			{
				$_SESSION['tiempo']=date("Y-m-d H:i:s");
				return true;
			}
		}
		return false;
	}//validarsesionactual

}


?>