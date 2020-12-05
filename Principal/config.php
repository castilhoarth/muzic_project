<!DOCTYPE html>
<html>
	<head>
		<title> Conexão - PHP </title>
	</head>
	<body>
		<?php 
			function conectar()
			{
				$hostdb = '127.0.0.1'; //servidor mysql, pode ser o nome (localhost) ou o endereço ip (127.0.0.1)
				$userdb = 'root'; //usuário do mysql que terá o acesso
				$passdb = ''; //senha do usuário

				if ($con = @mysql_connect($hostdb, $userdb, $passdb)) 
				{
					return $con;
				} else 
					return 0;
			}
		?>
	</body>
</html>