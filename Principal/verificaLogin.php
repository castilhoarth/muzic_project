<?php 
ini_set('display_errors', true);
error_reporting(E_ALL);
	// session_start inicia a sessão
	session_start();
	// as variáveis email e senha recebem os dados digitados na página anterior
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$result = mysqli_query ("SELECT * FROM tb_usuario where email like '$email' and senha like '$senha'");
	/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi 
	bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
	será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do 
	resultado ele redirecionará para a página site.php ou retornara  para a página 
	do formulário inicial para que se possa tentar novamente realizar o email */
	if(mysql_num_rows ($result) <= 1 )
	{
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;
		header('location:Perfil.php');
	}
	else{
		unset ($_SESSION['email']);
		unset ($_SESSION['senha']);
		header('location:home.php');
	  }
?>