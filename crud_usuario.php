<?php 
	require_once('conexion.php');
	require_once('usuario.php');
    require_once('keyprotect.php');
    require 'vendor/autoload.php';

	class CrudUsuario{

		public function __construct(){}

        //inserta los datos del usuario
        public function insertarUsuario($email, $name, $clave){
            $db=DB::conectar();
            $insert=$db->prepare('INSERT INTO Users VALUES(:email ,:name, :password, :accountid)');
            $insert->bindValue('email',$email);

            //encripta la clave
            //$pass=password_hash($usuario->getClave(),PASSWORD_DEFAULT);
            $encriptados = SaveEncrypted($name,$clave);

            $insert->bindValue('name', $encriptados['user']);
            $insert->bindValue('password',$encriptados['password']);
            $insert->bindValue('accountid',1);

            $insert->execute();
        }

		//obtiene el usuario para el login
		public function obtenerUsuario($name, $password){

            $db=Db::conectar();
            $select=$db->prepare('SELECT Name, Password FROM Users');//
            $select->execute();
            $usuarios_registrados=$select->fetchAll();
            $encontrado = 0;

            foreach ($usuarios_registrados as $user)
            {
                if (PHPassLib\Hash\BCrypt::verify($name, $user['Name']))
                {
                    $encontrado++;
                }

                if (PHPassLib\Hash\BCrypt::verify($password, $user['Password']))
                {
                    $encontrado++;
                }
            }

            if($encontrado == 2) //Comproba que es trobi l´usuari:
            {
                $select=$db->prepare('SELECT * FROM Users WHERE name=:name AND password=:password');//
                $select->bindValue('name',$name);
                $select->bindValue('password',$password);
                $select->execute();
                $registro=$select->fetch();
                $usuario=new Usuario();

                //verifica si la clave es correcta
                if ($password == $registro['Password']) {
                    //si es correcta, asigna los valores que trae desde la base de datos
                    $usuario->setEmail($registro['Email']);
                    $usuario->setName($registro['Name']);
                    $usuario->setPassword($registro['Password']);
                    $usuario->setAccountId($registro['AccountId']);
                }
            }
            else{
                $usuario = NULL;
            }

			return $usuario;
		}
	}
?>