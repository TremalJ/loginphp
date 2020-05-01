<?php 
	require_once('crud_news.php');
	require_once('noticia.php');
	$noticia=new Noticia();
	$crud=new CrudNoticia();
	$noticia = $crud->obtenerNoticia($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $noticia->getTitle(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body>
	<div class="w3-container w3-black w3-center">
		<h1><?php echo $noticia->getTitle(); ?></h1>
	</div>
	<p style="text-align: center;"><?php echo $noticia->getBody(); ?></p>
	<footer><?php echo $noticia->getDatetime(); ?></footer>
	<form class="w3-container" action="cuenta.php" method="post">
		<input type="hidden" name="salir" value="salir">
		<button class="w3-btn w3-green">Volver al menú</button>
	</form>
</body>
</html>