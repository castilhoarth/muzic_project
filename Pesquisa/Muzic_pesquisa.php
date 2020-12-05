<!DOCTYPE html>
<html>
  <head>
    <title>muzic. - Pesquisa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../w3.css">
    <link rel="stylesheet" href="../css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <style type="text/css">
    hr.style-eight {
    overflow: visible; /* For IE */
    padding: 0;
    border: none;
    border-top: medium double #9c27b0;
    color: #9c27b0;
    text-align: center;
    }
    hr.style-eight:after {
        content: "♫";
        display: inline-block;
        position: relative;
        top: -0.7em;
        font-size: 1.5em;
        padding: 0 0.25em;
        background: white;
    }
    hr.style-erro {
      overflow: visible; /* For IE */
      padding: 0;
      border: none;
      border-top: medium double red;
      color: red;
      text-align: center;
    }
    hr.style-erro:after {
        content: "⊗";
        display: inline-block;
        position: relative;
        top: -0.7em;
        font-size: 1.5em;
        padding: 0 0.25em;
        background: white;
    }
    .erro {
      color: red;
    }
  </style>

  <?php
    include 'config.php';
    include 'SQLExecute.php';
    $con = conectar();
    mysql_select_db('bd_tcc');
    mysql_set_charset('utf8');
  ?>
  
  <body>

    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
      <div class="w3-container w3-deep-purple">
        <font face="Light" size="6px"><a href="/Principal/Perfil.php"><i class="fa fa-arrow-left"></a></i> pesquisa. </font>
      </div>

      <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="w3-container">
        <p>
        <label> Eixo Musical: </label>
        <select name="opt_eixo" class="w3-select">
          <?php
          $getUsuario = "SELECT DISTINCT tipo_usuario FROM tb_usuario";
          $getUsuarioQuery = mysql_query($getUsuario) or die(mysql_error());

          while($getUsuarioLinha = mysql_fetch_array($getUsuarioQuery)){
            $Usuario = $getUsuarioLinha['tipo_usuario'];
            $idUsuario = $getUsuarioLinha['cod_usuario'];
            echo "<option name='$Usuario' value='$Usuario'>$Usuario</option>";
          }
          ?>
        </select>

        <br><br>

        <label> Gênero musical: </label>
        <select name="opt_genero" class="w3-select">
          <option name='Sertanejo' value='Sertanejo'>Sertanejo</option>
          <option name='MPB' value='MPB'>MPB</option>
          <option name='Samba' value='Samba'>Samba</option>
          <option name='Rock' value='Rock'>Rock</option>
          <option name='Funk' value='Funk'>Funk</option>
          <option name='Reggae' value='Reggae'>Reggae</option>
          <option name='Eletrônica' value='Eletrônica'>Eletrônica</option>
          <option name='Pagode' value='Pagode'>Pagode</option>
          <option name='Jazz' value='Jazz'>Jazz</option>
          <option name='Rap' value='Rap'>Rap</option>
        </select>

        <br><br>
        
        <label> Estado: </label>
        <select name="opt_estado" class="w3-select">

          <?php
          $getEstado = "SELECT * FROM tb_usuario";
          $getEstadoQuery = mysql_query($getEstado) or die(mysql_error());

          while($getEstadoLinha = mysql_fetch_array($getEstadoQuery)){
            $Estado = $getEstadoLinha['estado'];
            $idEstado = $getEstadoLinha['cod_usuario'];
            echo "<option name='$Estado' value='$Estado'>$Estado</option>";
          }
          ?>

        </select>
        <br><br>
        <center><input type="submit" class="w3-button w3-deep-purple" id="Pesquisar" name="Pesquisar" value="Pesquisar" /></center>
      </form>
    </div>

    <div class="w3-container" style="padding-left: 26%">
      <?php 
         if (!isset($_POST["Pesquisar"])) {
           # code...
           echo "
              <font face='Light' size='24px'><b><center> <p style='margin-top: 17% '> bem vindo(a) a página de pesquisas. <p></center></b></font>
              <hr class='style-eight'>
              <div class='w3-container divAlign'>
                <p class='resPesq'> Escolha três filtros que satisfaçam sua necessidade e encontre a pessoa certa para o trabalho. </p>
                <p class='resPesq'> A 'muzic. Plataforma' dispõe de um filtro especialmente preciso voltado para apresentar a você o melhor resultado em suas buscas, por isso necessita que todos os campos sejam preenchidos.</p>
              </div>
                 ";

          } else {

            $emptyVar = false;
            if (empty($eixo)) {
              $eixo = $_POST["opt_eixo"];
            }
              else if (empty($eixo) ) {
                # code...
                $eixo = $_POST["opt_eixo"];
                $emptyVar = false;
              }

            if (empty($genero)) 
            {
              $genero = $_POST["opt_genero"];
            }
              else if (empty($genero)) {
                # code...
                $genero = $_POST["opt_genero"];
                $emptyVar = false;
              }

            if (empty($estado)) 
            {
              $estado = $_POST["opt_estado"];
            } 
              else if (empty($estado)) {
                # code...
                $estado = $_POST["opt_estado"];
                $emptyVar = false;
              }


          //$sql = "SELECT * FROM tb_usuario WHERE estado LIKE '$estado' AND tipo_usuario LIKE '$eixo'";
          $sql = "SELECT * FROM tb_usuario INNER JOIN tb_genero ON tb_usuario.cod_usuario = tb_genero.cod_usuario WHERE tb_genero.genero_1 LIKE '%$genero%' AND tb_usuario.tipo_usuario LIKE '$eixo' AND tb_usuario.estado LIKE '$estado'";

          $res = SQLExecute($con,$sql);

          $quant = (mysql_num_rows($res));

          if ($quant==0){
            echo "
            <font face='Light' size='24px'><b><center> <p style='margin-top: 17% '> bem vindo(a) a página de pesquisas. <p></center></b></font>
              <hr class='style-erro'>
              <div class='w3-container divAlign'>
                <p class='resPesq erro'> Encontramos um erro na busca. </p>
                <p class='resPesq erro'> Não foram encontrados profissionais/amadores que atuem de acordo com os filtros selecionados.</p> <p class='resPes erro' desculpe. </p>
              </div>
                 ";
          } else {
      ?>

      <div class="w3-container">
      <font face='Light' size='5px'><b><center> <p style='margin-top: 5% '> Resultados encontrados: <p></center></b></font>
        <hr class="style-eight">

      <?php
        $user = "SELECT * FROM tb_usuario where tipo_usuario like '$eixo' and estado like '$estado'";
        $usu = SQLExecute($con,$user);
        $linha = mysql_fetch_array($usu);  //exibe as linhas encontradas na consulta
        $cod_user = $linha['cod_usuario'];

        $imagem = "SELECT * FROM tb_imagem where cod_usuario like '$cod_user'";
        $resImagem = SQLExecute($con, $imagem);
        $lnImagem = mysql_fetch_array($resImagem);  //exibe as linhas encontradas na consulta
        
        while ($row=mysql_fetch_array($res)){
      ?>
      
      <form name="perfil_externo" action="perfil_externo.php" method="POST">
      <ul class="w3-ul w3-card-4">
        <?php
          $cod_user = $row['cod_usuario'];
          echo "<li class='w3-bar'>";
          echo "<span onclick='this.parentElement.style.display='none' ' class='w3-bar-item w3-button w3-white w3-xlarge w3-right'>×</span>";
          echo "<img src='/Cadastro/IMAGENS/". $lnImagem['imagem']. "' class='w3-bar-item w3-border w3-round-xlarge' style='width:150px; height: 100px'>";
          echo "<div class='w3-bar-item'>";
          echo "<span class='w3-large'> " . $row['nome_usuario'] . " </span><br>";
          echo "<span> " . $row['tipo_usuario'] . " </span> &nbsp&nbsp&nbsp ";
          echo "<span> " . $row['estado'] . " </span>";
          echo "<br>";
          echo "<input type='hidden' name='cod' value=' " . $row['cod_usuario'] . " ''>";
          echo "<input type='submit' class='w3-button w3-small w3-deep-purple' value='Ver mais...''>";
          echo "</div>";
          echo "</li>";
        ?>
      </ul>
      <br>
      </form>
    <?php
        }
    }
  }
    ?> 
    </div>
    </div>
  </body>
</html> 