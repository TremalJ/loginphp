<?php
	require_once('usuario.php');
	require_once('crud_usuario.php');
	require_once('conexion.php');
    require_once('keyprotect.php');

use Defuse\Crypto\Crypto;

//inicio de sesion
	session_start();

	$usuario=new Usuario();
	$crud=new CrudUsuario();

	if (isset($_POST['entrar'])) { //verifica si la variable entrar está definida

		$usuario=$crud->obtenerUsuario($_POST['usuario'],$_POST['pas']);

		// si el id del objeto retornado no es null, quiere decir que encontro un registro en la base
		if (!is_null($usuario)) {
			$_SESSION['usuario']=$usuario; //si el usuario se encuentra, crea la sesión de usuario
			header('Location: cuenta.php'); //envia a la página que simula la cuenta
		}else{
			header('Location: error.php?mensaje=Tus nombre de usuario o clave son incorrectos'); // cuando los datos son incorrectos envia a la página de error
		}
	}elseif(isset($_POST['salir'])){ // cuando presiona el botòn salir
		header('Location: index.php');
		unset($_SESSION['usuario']); //destruye la sesión
	}
?>