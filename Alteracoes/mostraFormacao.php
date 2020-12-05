<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Muzic. - Alteração de Formação </title>
  </head>
  <link rel="stylesheet" href="../w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php 

  include 'config.php';
  include 'SQLExecute.php';
  $con = conectar();
  mysql_select_db('bd_tcc');
  mysql_set_charset('utf8');
  session_start();
  
  $email = $_SESSION['email'];
  $senha = $_SESSION['senha'];

  /*RECEBENDO VARIÁVEIS DE USUÁRIO*/

  $sql = "SELECT * FROM tb_usuario where email like '$email' AND senha like '$senha'";
  $res = SQLExecute($con,$sql);
  $row_user = mysql_fetch_array($res);

  $cod_user = $row_user['cod_usuario'];

  /*RECEBENDO VARIÁVEIS DE FORMAÇÃO*/

  $sql = "SELECT * FROM tb_form_usuario where cod_usuario like '$cod_user'";
  $res = SQLExecute($con,$sql);
  $row_form = mysql_fetch_array($res);

  $cod_form = $row_form['cod_formacao'];

  /*RECEBENDO VARIÁVEIS DE FORMAÇÃO-USUÁRIO*/

  $sql = "SELECT * FROM tb_formacao where cod_formacao like '$cod_form'";
  $res = SQLExecute($con,$sql);
  $row_form_user = mysql_fetch_array($res);

?>

  <body>
  <div class="w3-top">

    <div class="w3-bar w3-black w3-card" id="myNavbar">
      <a href="/o php modificado/login1.php" class="w3-bar-item w3-button w3-wide">MUZIC.</a>
      <div class="w3-right w3-hide-small">
        <button class="w3-bar-item w3-button"><i class="fa fa-search"></i> PESQUISAR </button>
        <a href="#about" class="w3-bar-item w3-button w3-wide">ABOUT.</a>
      </div>
    </div>

    </div> 
    <header><h1 style="margin-top: 5%; margin-left: 15%"> Alteração de Formação </h1></header>
       
    <div style="margin-left: 15%" class="w3-twothird">
      <form action="altFormacao.php" name="Cadastro" method="POST">
        <div class="w3-container m2 w3-padding-16 w3-border-deep-purple w3-border">
          <p> Digite da formação: </p>
          <p><input class="w3-input w3-border w3-padding-16" type="text" value="<?php echo $row_form_user['nome_formacao']?>" placeholder="Ex.: Violão Clássico" name="nome_formacao"></p>
        </div>

        <div class="w3-container m2 w3-padding-16 w3-border-deep-purple w3-border">
          <p> Instituição na qual você se formou: </p>
          <p><input class="w3-input w3-border w3-padding-16" type="text" placeholder="Ex.: Belas Artes" value="<?php echo $row_form_user['instituicao']?>" name="instituicao"></p>
        </div>

        <?php
        function tipo_form_grad(){
          if ($row_form['nome_formacao']=="Graduação"){
            return true;
          }
        }

        function tipo_form_bach(){
          if ($row_form['nome_formacao']=="Bacharelado"){
            return true;
          }
        }

        function tipo_form_lice(){
          if ($row_form['nome_formacao']=="Licenciatura"){
            return true;
          }
        }
        ?>

        <div class="w3-container m2 w3-padding-16 w3-border-deep-purple w3-border">
          <p>Tipo de formação:</p>
          <div class="w3-container">
            <input class="w3-radio" type="radio" name="tipo_curso" value="Graduação" checked="tipo_form_grad()"> Graduação
            <input class="w3-radio" type="radio" name="tipo_curso" value="Licenciatura" checked="tipo_form_lice()"> Licenciatura
            <input class="w3-radio" type="radio" name="tipo_curso" value="Bacharelado" checked="tipo_form_bach()"> Bacharelado
          </div>
        </div>

<div class="w3-container m2 w3-padding-16 w3-border-deep-purple w3-border">
          <p>Data de início:</p>
          <p><input class="w3-input w3-border w3-padding-16" type="date" value="<?php echo $row_form['data_inicio']?>" placeholder="Ex.: 01/04/1964" name="dt_inicio"></p>
        </div>

        <div class="w3-container m2 w3-padding-16 w3-border-deep-purple w3-border">
          <p>Data de término:</p>
          <p><input class="w3-input w3-border w3-padding-16" type="date" value="<?php echo $row_form['data_conclusao']?>" placeholder="Ex.: 01/04/1964" name="dt_termino"></p>
        </div>
        
        <div class="w3-container m2 w3-padding-32">
          <input type="submit" class="w3-button w3-purple" name="continuar" value="Continuar">
        </div>

      </form>
    </div>

  </body>
</html>