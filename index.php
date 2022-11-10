<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOME</title>
        <script src="https://kit.fontawesome.com/c65d405071.js" crossorigin="anonymous"></script>
</head>
<body>
	<!--Autores Carlos Eduardo Guedes e Henderson Felipe -->
	<center>
		<picture>
        <source srcset="imagens/pqtopo_ifpi.png" media="(max-width: 600px)">
        <source srcset="imagens/topo_ifpi.png" media="(max-width: 1500px)">
        <source srcset="imagens/topo_ifpi.png">
        <img src="imagens/topo_ifpi.png" alt="ifpi">
	    </picture>
		<div class="field">
		<h1>Bem-Vindo ao Agenda salas</h1>

		<div class="cadastro">
		<a href="reservar_sala.php"><input type="submit" name="acao" value="Reservar Sala"></a>

                <a href="salas_reservadas.php"><input type="submit" name="acao" value="Ver Salas Reservadas"></a>
                
                <a href="lista_usuarios.php"><input type="submit" name="acao" value="Ver Usuários Cadastrados"></a>
                
		</div>
		</div>
</center>
</body>
</html>