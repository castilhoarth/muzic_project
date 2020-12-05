<!DOCTYPE html>
<html>
	<head>
		<title> PHP - Função de executar comando SQL </title>
	</head>
	<body>
		<?php 
			/*
			$id - Ponteiro de conexão direta
			$sql - Cláusula SQL a executar
			$erro - Especifíca se a função exibe ou não (não = 0, sim = 1)
			$res - Resposta
			*/

			function SQLExecute($id, $sql, $erro = 1)
			{
				if (empty($sql) OR !($id)) 
				{
					return 0;
				}
				if (!($res = @mysql_query($sql, $id))) 
				{
					if ($erro) 
					{
						echo "Occorreu um erro! ";
						echo "<br>" . "<b> Comando: </b>". $sql ."<br>" . "<b> Id: </b>" . $id . "<br>";
						exit;
					}
				}
				return $res;
			}
		?>
	</body>
</html>