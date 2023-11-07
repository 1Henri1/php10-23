<!DOCTYPE html>
<html> 	
<head>
	<link rel="stylesheet" type="text/css" href="login.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
</head>
<body>	
	<?php if(isset($_SESSION)){ 
		session_start(); 
		$_SESSION['vitorias'] = 0;
		$_SESSION['derrotas'] = 0;
		$_SESSION['tentativas'] = 0;
		}?>
	<h1 style="text-align: center;">DIGITE UM NOME E COMECE A JOGAR AGORA</h1>

	<div class="log">
	<form method="post" action="jogo.php" class="form">
		<input type="text" autofocus class="input-login" name="nome" placeholder="Username" id="nome" required autocomplete="off"><br>
		<input class="input-entrar" type="submit" value="Jogar">
	</form>
	</div>

</body>
</html>