<?php
session_start();
unset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body>
<header>
    <div class="w3-container w3-black w3-center">
        <h1>AFEGIR NOU USUARI</h1>
    </div>
</header>


<div class="w3-container w3-green">
    <h2>Insertar usuari nou</h2>
</div>

<form class="w3-container" action="controller_insert.php" method="post">
    <p>
        <label class="w3-label">
            Email
        </label>
        <input class="w3-input w3-border " type="text" name="email">
    </p>
    <p>
        <label class="w3-label">
            Usuari
        </label>
        <input class="w3-input w3-border " type="text" name="usuario">
    </p>
    <p>
        <label class="w3-label">Password</label>
        <input class="w3-input w3-border" type="password" name="pas">
    </p>
    <p>
        <input type="hidden" name="entrar" value="entrar">
        <button class="w3-btn w3-green">Aceptar</button>
    </p>
    <a href="index.php">Tornar a página de login</a>
</form>
<footer>
    <div class="w3-container w3-black">
        <h4>josep escriva - UOC 2018</h4>
    </div>
</footer>
</body>
</html>