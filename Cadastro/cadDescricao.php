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

  $descricao = $_POST["descricao"];

/*INSERÇÃO DE DADOS NA TABELA DESCRIÇÃO*/

  $sql = "SELECT * FROM tb_usuario where email like '$email'";
  $res = SQLExecute($con,$sql);
  $row = mysql_fetch_array($res);
  $cod_user = $row['cod_usuario'];

  $sql="INSERT INTO tb_experiencia (cod_usuario, descricao) VALUES ( '$cod_user', '$descricao')";
  $res = SQLExecute($con,$sql);

  header('location:imgInsert.php');
?>