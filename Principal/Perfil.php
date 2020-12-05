<!DOCTYPE html>
<html>
  <head>
    <meta charset=utf-8" />
    <title> muzic. - Perfil </title>
  </head>
  <link rel="stylesheet" href="../w3.css">
  <link rel="stylesheet" href="../css.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php
      ini_set('display_errors', true);
      error_reporting(E_ALL);
      include 'config.php';
      include 'SQLExecute.php';
      $con = conectar();
      mysql_select_db('bd_tcc');
      mysql_set_charset('utf8');

      session_start();

      $email = $_SESSION['email'];
      $senha = $_SESSION['senha'];

      $sql = "SELECT * FROM tb_usuario where email like '$email' and senha like '$senha'";
      $res = SQLExecute($con,$sql);
      $row = mysql_fetch_array($res);  //exibe as linhas encontradas na consulta
      

      $quant = (mysql_num_rows($res)); 
      if ($quant==0){
        header("location:home.php");
      }
      else {
        //DADOS DA TABELA EXPERIÊNCIA
        $cod_user = $row['cod_usuario'];
        $experiencia = "SELECT * FROM tb_experiencia where cod_usuario like '$cod_user'";
        $resExp = SQLExecute($con, $experiencia);
        $lnExp = mysql_fetch_array($resExp);  //exibe as linhas encontradas na consulta

        //DADOS DA TABELA GÊNERO
        $genero = "SELECT * FROM tb_genero where cod_usuario like '$cod_user'";
        $resGen = SQLExecute($con, $genero);
        $lnGen = mysql_fetch_array($resGen);  //exibe as linhas encontradas na consulta

        //DADOS DA TABELA FORMAÇÃO (LIGAÇÃO E DATA)
        $formUser = "SELECT * FROM tb_form_usuario where cod_usuario like '$cod_user'";
        $resFormUser = SQLExecute($con, $formUser);
        $lnFormUser = mysql_fetch_array($resFormUser);  //exibe as linhas encontradas na consulta
        $cod_formacao = $lnFormUser['cod_formacao'];

        //DADOS DA TABELA FORMAÇÃO
        $formacao = "SELECT * FROM tb_formacao where cod_formacao like '$cod_formacao'";
        $resForm = SQLExecute($con, $formacao);
        $lnForm = mysql_fetch_array($resForm);  //exibe as linhas encontradas na consulta

        //DADOS DA TABELA IMAGEM
        $imagem = "SELECT * FROM tb_imagem where cod_usuario like '$cod_user'";
        $resImagem = SQLExecute($con, $imagem);
        $lnImagem = mysql_fetch_array($resImagem);  //exibe as linhas encontradas na consulta
      ?> 

<body color="#525A62">
    <!--Barra de navegação -->
  <font face = "Verdana">
    <div class="w3-top">
      <div class="w3-bar w3-black w3-card" id="myNavbar">
        <a href="home.php" class="w3-bar-item w3-button w3-wide">MUZIC.</a>

        <div class="w3-right w3-hide-small">
          <button class="w3-button" onclick="location.href='/Pesquisa/Muzic_pesquisa.php';"><i class="fa fa-search"></i> PESQUISAR </button>
        </div>
        </a>
      </div>
    </div> 
  </font>

  <div class="w3-content w3-margin-top" style="max-width:1400px; padding-top: 2.2%; ">
  <!-- The Grid -->
    <div class="w3-row-padding" style="margin-top: 2%">
      <!-- Left Column -->
      <div class="w3-third">
        <div class="w3-light-grey w3-text-grey w3-card-4">
          <?php 
            echo "<div class='w3-display-container'>";
            echo "<img src='/Cadastro/IMAGENS/". $lnImagem['imagem'] ."' style='width:428px; height: 400px' alt='Avatar'>";
            echo "<div class='w3-display-bottomleft w3-container w3-light-grey w3-opacity'>";
            echo "<h2 class='w3-text-purple'>"; 
            echo $row['nome_usuario']; 
            echo "</h2>";
            echo "</div>";
          ?>
          </div>
          <div class="w3-container">
            <div class="w3-container">
              <h2 class="w3-text-purple"> Informações Pessoais </h2>
            </div>

            <p><i class="fa fa-headphones fa-fw w3-margin-right w3-large w3-text-deep-purple"></i><?php echo $lnGen['genero_1']; ?></p>
            <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-deep-purple"></i><?php echo $row['estado']; ?></p>
            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-deep-purple"></i><?php echo $row['email']; ?> </p>
            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-deep-purple"></i><?php echo $row['celular']; ?></p>
            <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="/Alteracoes/mostraUsuario.php">Alterar</a></p>
            <hr>
            <br>
          </div>
        </div>
      <br>
    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-light-grey w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-play fa-fw w3-margin-right w3-xxlarge w3-text-deep-purple"></i> Descrição de carreira </h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b> Um pouco sobre <?php echo $row['nome_usuario']; ?>: </b></h5>
          
          <p style="text-align: justify;"> <?php echo $lnExp['descricao']; ?> </p>
          <p style="text-align: justify;"> <a href="/Alteracoes/mostraDescricao.php">Alterar</a> </p>
        </div>
      </div>

      <div class="w3-container w3-card w3-light-grey">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-deep-purple"></i>Formações</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b><?php echo $lnForm['tipo_curso']; ?> em  <?php echo $lnForm['instituicao']; ?> </b></h5>
          <p><?php echo $lnForm['nome_formacao']; ?></p>
          <h6 class="w3-text-deep-purple"><i class="fa fa-calendar fa-fw w3-margin-right"></i> <?php echo implode('/',array_reverse(explode('-', $lnFormUser['data_inicio']))); ?> - <?php echo implode('/',array_reverse(explode('-', $lnFormUser['data_conclusao']))); ?> </h6>
          <p><a href="/Alteracoes/mostraFormacao.php">Alterar</a></p>
          
          <hr>
        </div>
      </div>
      
    </div>
  </div>
</div>

<footer class="w3-container w3-black w3-center w3-margin-top">
  <p>Desenvolvido por:</p>
  <i> CMG Softwares, inc. </i>

  <p><a href="home.php" target="_self">encerrar sessão.</a></p>
</footer>
<?php
      } 
      $_SESSION['cod_usuario'] = $cod_user;
      $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
?>
  </body>
</html>