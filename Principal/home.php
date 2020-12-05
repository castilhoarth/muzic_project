<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>muzic. - Home</title>
  </head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../w3.css">
  <link rel="stylesheet" href="../css.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
    body, html {
        height: 100%;
        line-height: 1.8;
    }
  </style>

  <?php
    include 'config.php';
    include 'SQLExecute.php';
    $con = conectar();
    mysql_select_db('bd_tcc' );

    session_start();

    $_SESSION['email'] = "";
    $_SESSION['senha'] = "";
    
    $senha = $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = ($_POST['email']);
      $senha = ($_POST['senha']);
  }
  ?>

  <body color="#525A62">
    <!--Barra de navegação -->
  <font face = "Verdana">
    <div class="w3-top">
      <div class="w3-bar w3-black w3-card" id="myNavbar">
        <a href="#home" class="w3-bar-item w3-button w3-wide">MUZIC.</a>

        <div class="w3-right w3-hide-small">
        <div id="contact" class="w3-modal">
          <div class="w3-modal-content w3-animate-zoom">
          <div class="w3-container w3-deep-purple">
            <span onclick="document.getElementById('contact').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
              <h2>LOGIN</h2>
          </div>
            <div class="w3-container w3-white">
              <p class="w3-text-grey"> Digite os dados abaixo: </p>
              <form method="POST" action="verificaLogin.php">
                <p><input class="w3-input w3-padding-16" type="text" placeholder="Email" name="email"></p>
                <p><input class="w3-input w3-padding-16" type="password" placeholder="Senha" name="senha"></p>
                <p><button class="w3-button w3-black" type="submit">login.</button></p>
          		</form>
            </div>
      		</div>
    		</div>
          <button onclick="document.getElementById('contact').style.display='block'" class="w3-bar-item w3-button"><i class="fa fa-user"></i> LOGIN </button>
          <a href="#about" class="w3-bar-item w3-button w3-wide">ABOUT.</a>
        </div>
      </div>
    </div>
  </font>

    <!-- Header with full-height image -->
    <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
      <div class="w3-display-left w3-text-white" style="padding:48px">
      
        <span class="w3-large"><h1><font face="Simplifica" size="24px"> Encontre-se com os eixos da música! </font></h1></span>
        <p><a href="/Cadastro/cadUsuario.php" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-hover-opacity-off">Cadastre-se!</a></p>
    </header>
  	
    </div>
    <br><br><br>

    <!--Sobre nós !-->
    <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="about">
      <h2 class="w3-wide">Projeto muzic.</h2>
      <p class="w3-opacity"><i> We are Music. </i></p>
      <p class="w3-justify">O projeto consiste, primordialmente, em estabelecer uma comunicação profissional ou amadora entre compositores, cantores e arranjadores. O site apresentará desde informações básicas, como por exemplo, o nome e a localização do usuário, até informações mais precisa, como o tipo de música, a formação e as experiências práticas dos usuários</p>
      <div class="w3-row w3-padding-32">
        <div class="w3-third">
          <p>Cantores</p>
          <img src="Cantor.jpg" class="w3-round w3-margin-bottom" alt="Cantor" style="width:60%">
        </div>
        <div class="w3-third">
          <p>Arranjadores</p>
          <img src="Arranjador.jpg" class="w3-round w3-margin-bottom" alt="Arranjador" style="width:60%">
        </div>
        <div class="w3-third">
          <p>Compositores</p>
          <img src="Compositor.jpg" class="w3-round" alt="Compositor" style="width:60%">
        </div>
      </div>
    </div>

    <!-- Footer -->

    <footer class="w3-center w3-black w3-padding-32">
      <p>Desenvolvido por:</p>
      <i> CMG Softwares, inc. </i>
      <p><a href="#home" class="w3-button w3-black"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
      </p>
    </footer>


  </body>
</html>
