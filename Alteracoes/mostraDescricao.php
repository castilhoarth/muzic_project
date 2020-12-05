<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Muzic. - Alteração de Descrição </title>
  </head>
  <link rel="stylesheet" href="../w3.css">
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

    $cod_user = $row['cod_usuario'];

    $sql = "SELECT * FROM tb_experiencia where cod_usuario like '$cod_user'";
    $res = SQLExecute($con,$sql);
    $row = mysql_fetch_array($res);
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
    <header><h1 style="margin-top: 5%; margin-left: 15%"> Alteração de Descrição </h1></header>
       
    <div style="margin-left: 15%" class="w3-twothird">
      <form action="altDescricao.php" name="Cadastro" method="POST">
        <div class="w3-container m2 w3-padding-16 w3-border-deep-purple w3-border">
         
          <p><textarea rows="4" cols="50" placeholder="max. 400 caracteres" class="w3-input" name="descricao"><?php echo $row['descricao']?></textarea>
        </div>

        <div class="w3-container m2 w3-padding-32">
          <input type="submit" class="w3-button w3-purple" name="continuar" value="Alterar">
        </div>

      </form>
    </div>

  </body>
</html>