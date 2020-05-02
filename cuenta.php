<?php 
	session_start();
	require_once('crud_news.php');
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}

	$crud=new CrudNoticia();
	$noticias=$crud->obtenerNoticias();

?>

<!DOCTYPE html>

<html>
<head>
	<title>Tu cuenta</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body>
	<div class="w3-container w3-black w3-center">
		<h1>BENVINGUT AL PANELL DE NOTÍCIES</h1>
	</div>
	<?php foreach ($noticias as $noticia) {?>
	<p style="text-align: center;"><a href="news.php?id=<?php echo $noticia['Id']; ?>"><?php echo $noticia['Title']; ?></a></p>
	<?php  } ?>
	<form class="w3-container" action="controller_login.php" method="post">
		<input type="hidden" name="salir" value="salir">
		<button class="w3-btn w3-green">Salir</button>
	</form>
</body>
</html>