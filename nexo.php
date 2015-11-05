<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/cd.php");
require_once("clases/validadora.php");

$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'foto':
		include("partes/imagen.php");
		break;
	case 'video':
			include("partes/video.html");
		break;	
	case 'MostarBotones':
			include("partes/botonesABM.php");
		break;
	case 'MostrarGrilla':
			include("partes/formGrilla.php");
		break;
	case 'MostarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostrarFormAlta':
			include("partes/formCd.php");
		break;
	case 'BorrarCD':
			$cd = new cd();
			$cd->id=$_POST['id'];
			$cantidad=$cd->BorrarCd();
			echo $cantidad;

		break;
	case 'GuardarCD':
			$cd = new cd();
			$cd->id=$_POST['id'];
			$cd->cantante=$_POST['cantante'];
			$cd->titulo=$_POST['titulo'];
			$cd->año=$_POST['anio'];
			$cantidad=$cd->GuardarCD();
			echo $cantidad;

		break;
	case 'TraerCD':
			$cd = cd::TraerUnCd($_POST['id']);		
			echo json_encode($cd) ;

		break;
	case 'validarLogin': 
	session_start();
	$retorno;
	if(validadora::validarLogin($_POST['usuario'],$_POST['clave'],$_POST['recordarme']))
		{
			//$_SESSION['registrado']="octavio";
			$retorno="Esta";
		}
	else
		{
			$retorno="No-esta";
		}
		echo $retorno;
		//include("php/validarUsuario.php");
	break;
	default:
		# code...
		break;
}

 ?>