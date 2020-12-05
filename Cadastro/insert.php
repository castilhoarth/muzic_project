  <?php

	ini_set('display_errors', true);
    error_reporting(E_ALL);
    include 'config.php';
    include 'SQLExecute.php';
    $con = conectar();
    mysql_select_db('bd_tcc');
    mysql_set_charset('utf8');

    session_start();

    $_SESSION['email'] = "";
    $_SESSION['senha'] = "";

	$nome = $_POST["nome"];
	$tipo = $_POST["tipo"];
	$idade = $_POST["idade"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	$estado = $_POST["estado"];
	$tel = $_POST["tel"];


 //$model_selection = array('$_POST["model_selection"]' => ',' );
    for ($i=0; $i < 1; $i++) { 
    $model_selection = $_POST["model_selection"];
    //echo (implode(",", $model_selection));
}

$genero = implode(", ", $model_selection);


$sql="INSERT INTO tb_usuario (nome_usuario, tipo_usuario, data, email, senha, celular, estado) VALUES ('$nome','$tipo','$idade','$email','$senha','$tel','$estado')";

$res = SQLExecute($con,$sql);


$sql = "SELECT * FROM tb_usuario where email like '$email' AND senha like '$senha'";

$res = SQLExecute($con,$sql);
$row = mysql_fetch_array($res);
$cod_user = $row['cod_usuario'];

$_SESSION['cod_usuario'] = $cod_user;

$sql="INSERT INTO tb_genero (cod_usuario, genero_1) VALUES ($cod_user, '$genero')";
$res = SQLExecute($con,$sql);

$_SESSION['senha'] = $senha;
$_SESSION['email'] = $email;

/*
$sql = "INSERT INTO tb_experiencia (cod_usuario, descricao) VALUES ($cod_user, '$descricao')";
$res = SQLExecute($con,$sql); */


header("location: cadFormacao.html");
?>