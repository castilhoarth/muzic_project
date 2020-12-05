<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> muzic. - Alteração de Perfil </title>
  </head>
  <link rel="stylesheet" href="../w3.css">
  <link rel="stylesheet" href="../css.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../w3.css">
  <link rel="stylesheet" href="../css.css">
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


    $sql = "SELECT * FROM tb_usuario where email like '$email' AND senha like '$senha'";
    $res = SQLExecute($con,$sql);
    $row = mysql_fetch_array($res);
?>

  <script type="text/javascript">

    function valida(){
    vazio=false;
      if(document.Cadastro.nome.value==""){
        alert("O campo 'Nome' deve ser preenchido.");
        vazio=true;
      }
      if(document.Cadastro.tipo.value==""){
        alert("O campo 'Tipo de Usuário' social deve ser preenchido.");
        vazio=true;
      }
      if(document.Cadastro.tel.value==""){
        alert("O campo 'Celular' deve ser especificado.");
        vazio=true;
      }
      if(document.Cadastro.idade.value==""){
        alert("O campo 'Data de Nascimento' deve ser preenchido.");
        vazio=true;
      }
      if(document.Cadastro.estado.value==""){
        alert("O campo 'Estado' deve ser preenchido.");
        vazio=true;
      }
      if(document.Cadastro.email.value==""){
        alert("O campo 'E-mail' deve ser preenchido.");
        vazio=true;
      }
      if(document.Cadastro.senha.value==""){
        alert("O campo 'Senha' deve ser preenchido.");
        vazio=true;
      }
      if(document.Cadastro.senha2.value==""){
        alert("O campo 'Confirmação de Senha' deve ser preenchido.");
        vazio=true;
      }
      if(document.Cadastro.senha2.value!=document.Cadastro.senha.value){
        alert("As senhas não coincidem.");
        vazio=true;
      }
      if(vazio==false) document.Cadastro.submit();
    }
  </script>

  <body>
  <div class="w3-top">
    <div class="w3-bar w3-black w3-card" id="myNavbar">
      <a href="/Principal/home.php" class="w3-bar-item w3-button w3-wide">MUZIC.</a>
      <div class="w3-right w3-hide-small">
        <button class="w3-bar-item w3-button"><i class="fa fa-search"></i> PESQUISAR </button>
      </div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    </div>
  </div>

    <header><h1 style="margin-top: 5%; margin-left:15%">Alteração de Perfil </h1></header>

    <div style="margin-left: 15%" class="w3-twothird">

      <form action="altUsuario.php" name="Cadastro" method="POST">
        <div class="w3-container m2 w3-padding-16 w3-border-deep-purple w3-border">
          <p> Nome: </p>
          <p><input class="w3-input w3-border w3-padding-16" type="text" name="nome" value="<?php echo $row['nome_usuario']?>"></p>
        </div>

        <?php
        function tipo_cantor(){
          if ($row['tipo_usuario']=="Cantor"){
            return true;
          }
        }

        function tipo_comp(){
          if ($row['tipo_usuario']=="Compositor"){
            return true;
          }
        }

        function tipo_arra(){
          if ($row['tipo_usuario']=="Arranjador"){
            return true;
          }
        }
        ?>

        <div class="w3-container m2 w3-padding-16 w3-border-deep-purple w3-border">
          <p>Tipo de usuário:</p>
          <div class="w3-container">
            <input class="w3-radio" type="radio" name="tipo" value="Cantor" checked="tipo_cantor()"> Cantor
            <input class="w3-radio" type="radio" name="tipo" value="Compositor" checked="tipo_comp()"> Compositor
            <input class="w3-radio" type="radio" name="tipo" value="Arranjador" checked="tipo_arra()"> Arranjador
          </div>
        </div>
      

        <div class="w3-container m2 w3-padding-16 w3-border-deep-purple w3-border">
          <p> Nº de Celular:</p>
          <p><input class="w3-input w3-border w3-padding-16 cel-sp-mask" value="<?php echo $row['celular']?>" type="text" name="tel" maxlength="14"></p>
        </div>

        <div class="w3-container m2 w3-padding-16 w3-border-deep-purple w3-border">
          <p>Data de nascimento:</p>
          <p><input class="w3-input w3-border w3-padding-16" type="date" value="<?php echo $row['data']?>" placeholder="Ex.: 01/04/1964" name="idade"></p>
        </div>

        <input type="hidden" name="tipo_usuario" value="<?php echo $row['tipo_usuario']?>">

        <div class="w3-container m2 w3-padding-16 w3-border-deep-purple w3-border">
          <p> Estado: </p>
          <select name="estado" class="w3-input w3-border w3-padding-16 w3-combobox">
            <option value="<?php echo $row['estado']?>" name="<?php echo $row['estado']?>"><?php echo $row['estado']?></option>
            <option value="Acre" name="Acre">Acre</option>
            <option value="Alagoas" name="Alagoas">Alagoas</option>
            <option value="Amapá" name="Amapá">Amapá</option>
            <option value="Amazonas" name="Amazonas">Amazonas</option>
            <option value="Bahia" name="Bahia">Bahia</option>
            <option value="Ceará" name="Ceará">Ceará</option>
            <option value="Distrito" name="Distrito">Distrito Federal</option>
            <option value="Espírito Santo" name="Espírito Santo">Espírito Santo</option>
            <option value="Goiás" name="Goiás">Goiás</option>
            <option value="Maranhão" name="Maranhão">Maranhão</option>
            <option value="Mato Grosso" name="Mato Grosso">Mato Grosso</option>
            <option value="Mato Grosso do Sul" name="Mato Grosso do Sul">Mato Grosso do Sul</option>
            <option value="Minas Gerais" name="Minas Gerais">Minas Gerais</option>
            <option value="Pará" name="Pará">Pará</option>
            <option value="Paraíba" name="Paraíba">Paraíba</option>
            <option value="Paraná" name="Paraná">Paraná</option>
            <option value="Pernambuco" name="Pernambuco">Pernambuco</option>
            <option value="Piauí" name="Piauí">Piauí</option>
            <option value="Rio de Janeiro" name="Rio de Janeiro">Rio de Janeiro</option>
            <option value="Rio Grande do Norte" name="Rio Grande do Norte">Rio Grande do Norte</option>
            <option value="Rio Grande do Sul" name="Rio Grande do Sul">Rio Grande do Sul</option>
            <option value="Rondônia" name="Rondônia">Rondônia</option>
            <option value="Roraima" name="Roraima">Roraima</option>
            <option value="Santa Catarina" name="Santa Catarina">Santa Catarina</option>
            <option value="São Paulo" name="São Paulo">São Paulo</option>
            <option value="Sergipe" name="Sergipe">Sergipe</option>
            <option value="Tocantins" name="Tocantins">Tocantins</option>
          </select>
        </div>

        <div class="w3-container m2 w3-padding-16 w3-border-deep-purple w3-border">
          <p> E-mail: </p>
          <p><input type="text" name="email" value="<?php echo $row['email']?>" class="w3-input w3-border w3-padding-16"></p>

          <p class="w3-padding-16"> Senha: </p>
          <p><input type="password" name="senha" value="<?php echo $row['senha']?>" class="w3-input w3-border w3-padding-16"></p>

          <p> Confirme sua senha: </p> 
          <p><input type="password" name="senha2" class="w3-input w3-border w3-padding-16"></p>
        </div>

        <div class="w3-container m2 w3-padding-32">
          <input type="button" class="w3-button w3-hover-deep-purple" onclick="valida()" name="continuar" value="Alterar">
        </div>

      </form>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  </body>
</html>