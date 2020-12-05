<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Muzic. - Cadastro </title>
  </head>
  <link rel="stylesheet" href="../w3.css">
  <link rel="stylesheet" href="../css.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script type="text/javascript">
    function KeepCount()  { 
      var elements = document.getElementsByName("model_selection[]");
      var total = 0;
      for(var i in elements) {
        var element = elements[i];
          
        if(element.checked) total++;
         
        if(total>3) {
          alert("Escolha no máximo 3 estilos.");
          element.checked = false;
          return false;    
        }
      }
    } 
  </script> 

  <?php
    include 'config.php';
    include 'SQLExecute.php';
    $con = conectar();
    mysql_select_db('bd_tcc');
    mysql_set_charset('utf8');

    $nome = $_POST["nome"];
    $tipo = $_POST["tipo"];
    $tel = $_POST["tel"];
    $idade = $_POST["idade"];
    $estado = $_POST["estado"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
  ?>

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

    <header><h1 style="margin-top: 5%; margin-left: 45%"> Cadastro: </h1></header>
       
    <div style="margin-left: 15%" class="w3-twothird" align="center">
      <form action="insert.php" name="Cadastro2" method="POST">
        <div>
          <p class="w3-large"> Selecione seu(s) gênero(s) de preferência(máx 3):  </p>
          <div class="w3-container">
            <input class="w3-check" type="checkbox" value="Sertanejo" name="model_selection[]" onclick="return KeepCount()">Sertanejo
            <input class="w3-check" type="checkbox" value="MPB" name="model_selection[]" onclick="return KeepCount()">MPB
            <input class="w3-check" type="checkbox" value="Samba" name="model_selection[]" onclick="return KeepCount()">Samba
            <input class="w3-check" type="checkbox" value="Rock" name="model_selection[]" onclick="return KeepCount()">Rock
            <input class="w3-check" type="checkbox" value="Funk" name="model_selection[]" onclick="return KeepCount()">Funk
            <br>
            <br>
            <input class="w3-check" type="checkbox" value="Reggae" name="model_selection[]" onclick="return KeepCount()">Reggae
            <input class="w3-check" type="checkbox" value="Eletrônica" name="model_selection[]" onclick="return KeepCount()">Eletrônica
            <input class="w3-check" type="checkbox" value="Pagode" name="model_selection[]" onclick="return KeepCount()">Pagode
            <input class="w3-check" type="checkbox" value="Jazz" name="model_selection[]" onclick="return KeepCount()">Jazz
            <input class="w3-check" type="checkbox" value="Rap" name="model_selection[]" onclick="return KeepCount()">Rap
          </div>

          <!-- <div>
            <p><textarea class="w3-card-4 w3-border w3-border-deep-purple" name="descricao" placeholder="Insira aqui o seu Release/descrição de carreira..." cols="70" rows="10"></textarea></p>
            <p> -->
              <br>
              
              <input class="w3-button w3-block w3-card-4 w3-border w3-border-deep-purple w3-deep-purple" style="width: 73%" type="submit" name="continuar" value="Continuar"></p>
          </div>
          <!-- OS HIDDENS QUE CARREGAM AS VARIÁVEIS ANTERIORES -->
          <input type="hidden" name="nome" value= "<?php echo $nome ?>">
          <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
          <input type="hidden" name="idade" value="<?php echo $idade ?>">
          <input type="hidden" name="email" value="<?php echo $email ?>">
          <input type="hidden" name="senha" value="<?php echo $senha ?>">
          <input type="hidden" name="estado" value="<?php echo $estado ?>">
          <input type="hidden" name="tel" value="<?php echo $tel ?>">
        </div>
      </form>
    </div>
  </body>
</html>