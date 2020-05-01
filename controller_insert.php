<?php
	require_once('usuario.php');
	require_once('insertar_usuario.php');
	require_once('crud_usuario.php');
	require_once('conexion.php');
    require_once('keyprotect.php');


//inicio de sesion
	$usuario=new Usuario();
	$crud=new CrudUsuario();

	if (isset($_POST['entrar'])) { //verifica si la variable entrar está definida

		// si el id del objeto retornado no es null, quiere decir que encontro un registro en la base
		if ($usuario->getAccountId() == NULL) {
		    if($_POST['email'] == NULL || $_POST['usuario'] == NULL || $_POST['pas'] == NULL )
            {
                header('Location: error.php?mensaje=Els camps no poden estar buits!');
            }
		    else{
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $usuario=$crud->insertarUsuario($_POST['email'], $_POST['usuario'],$_POST['pas'],1);
                    header('Location: insertado.php?mensaje=L´usuari s´ha insertat correctament!'); //envia a la página que simula la cuenta
                }
                else{
                    header('Location: error.php?mensaje=Email introduït incorrecte!');
                }
            }
		}else{
			header('Location: error.php?mensaje=L´usuari insertat ja existeix!'); // cuando los datos son incorrectos envia a la página de error
		}
	}elseif(isset($_POST['salir'])){ // cuando presiona el botòn salir
		header('Location: index.php');
		unset($_SESSION['usuario']); //destruye la sesión
	}
?>