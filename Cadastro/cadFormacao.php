<?php
  session_start();

  $email = $_SESSION['email'];
  $senha = $_SESSION['senha'];
  $cod_user = $_SESSION['cod_usuario'];

  ini_set('display_errors', true);
  error_reporting(E_ALL);
  include 'config.php';
  include 'SQLExecute.php';
  $con = conectar();
  mysql_select_db('bd_tcc');
  mysql_set_charset('utf8');

  $nome_formacao = $_POST['nome_formacao'];
  $instituicao = $_POST['instituicao'];
  $tipo_curso = $_POST['tipo_curso'];

/*INSERÇÃO DE DADOS NA TABELA FORMAÇÃO*/

  $sql="INSERT INTO tb_formacao (nome_formacao, instituicao, tipo_curso) VALUES ( '$nome_formacao', '$instituicao', '$tipo_curso')";
  $res = SQLExecute($con,$sql);

/*INSERÇÃO DE DADOS NA TABELA FORMAÇÃO-USUÁRIO*/

  $sql = "SELECT * FROM tb_usuario where email like '$email' and senha like '$senha'";
  $res = SQLExecute($con,$sql);
  $row = mysql_fetch_array($res);

  $sql = "SELECT * FROM tb_formacao where nome_formacao like '$nome_formacao' AND  instituicao like '$instituicao' AND  tipo_curso like '$tipo_curso'";
  $res = SQLExecute($con,$sql);
  $row = mysql_fetch_array($res);
  $cod_form = $row['cod_formacao'];

  $dt_inicio = $_POST["dt_inicio"];
  $dt_termino = $_POST["dt_termino"];

  $sql="INSERT INTO tb_form_usuario (cod_usuario, cod_formacao, data_inicio, data_conclusao) VALUES ('$cod_user', '$cod_form', '$dt_inicio', '$dt_termino')";
  $res = SQLExecute($con,$sql);


  header('location:cadDescricao.html');
?>