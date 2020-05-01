<?php 
	require_once('conexion.php');
	require_once('noticia.php');
	
	class CrudNoticia{

		public function __construct(){}

		//obtiene todas la noticias
		public function obtenerNoticias(){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM News');//
			$select->execute();
			$noticias=$select->fetchAll();	
			return $noticias;
		}

		//obtiene la noticia por id
		public function obtenerNoticia($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM News WHERE Id=:id');//
			$select->bindValue('id',$id);
			$select->execute();
			$registro=$select->fetch();

			$noticia=new Noticia();	
			$noticia->setTitle($registro['Title']);
			$noticia->setBody($registro['Body']);
			$noticia->setDatetime($registro['Datetime']);
			return $noticia;
		}
	}
?>