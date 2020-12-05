<?php 
	ini_set('display_errors', true);
    error_reporting(E_ALL);
    include 'SQLExecute.php';

    session_start();

    $usuario = $_SESSION['cod_usuario'];

    $db = mysqli_connect("127.0.0.1", "root", "", "bd_tcc");

	// Initialize message variable
  	$msg = "";

	  // If upload button is clicked ...
	if (isset($_POST['upload'])) {
	  // Get image name
	  $image = $_FILES['image']['name'];

	  // image file directory
	  $target = "IMAGENS/".basename($image);

	  $sql = "INSERT INTO tb_imagem (cod_usuario, imagem) VALUES ('$usuario', '$image')";
	  // execute query
	  mysqli_query($db, $sql);

	  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
	  	//$msg = "Imagem inserida com sucesso";
      header("location:/Principal/home.php");
	  }else{
	  	//$msg = "A Imagem não pôde ser importada";
	  }
	}
	$result = mysqli_query($db, "SELECT * FROM tb_imagem");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"></head>
    <title> muzic. - Cadastro </title>
  </head>
    <link rel="stylesheet" href="../w3.css">
    <link rel="stylesheet" href="../css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <body>

    <!--Barra de navegação -->
    <div class="w3-top">
      <div class="w3-bar w3-black w3-card" id="myNavbar">
        <a href="#home" class="w3-bar-item w3-button w3-wide">MUZIC.</a>
        <!-- Right navbar links -->
        <div class="w3-right w3-hide-small">    

          
      <!-- Login -->
        <div id="contact" class="w3-modal">
          <div class="w3-modal-content w3-animate-zoom">
            <div class="w3-container w3-deep-purple">
              <span onclick="document.getElementById('contact').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
              <h2>LOGIN</h2>
            </div>
            <div class="w3-container w3-white">
              <p class="w3-text-grey"> Digite os dados abaixo: </p>
              <!-- <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> -->
              <form method="POST" action="/Principal/Perfil.php">
                <p><input class="w3-input w3-padding-16" type="text" placeholder="Email" name="email"></p>
                <p><input class="w3-input w3-padding-16" type="password" placeholder="Senha" name="senha"></p>
                <p><button class="w3-button w3-black" type="submit">login.</button></p>
              </form>
            </div>
          </div>
        </div>
          <button onclick="document.getElementById('contact').style.display='block'" class="w3-bar-item w3-button"><i class="fa fa-user"></i> LOGIN </button>
          <a href="/o php modificado/home.php#about" class="w3-bar-item w3-button w3-wide">ABOUT.</a>
        </div>
      </div>
    </div>
<div class="w3-display-middle w3-content w3-container w3-half">
      <?php
        // while ($row = mysqli_fetch_array($result)) {
        //   echo "<div id='img_div'>";
        //   	echo "<img src='IMAGENS/". $row['imagem'] ."' >";
        //   	echo $msg;
        //   echo "</div>";  
        //   //C:/Program Files/EasyPHP-Devserver-17/eds-www/Cadastro/
        // }
      ?>
      <p> <center> Por fim, adicione uma foto atual para completar o seu perfil: </p>
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
      	<input class="w3-input w3-purple" type="hidden" name="size" value="1000000">
      	<div>
      	  <input type="file" name="image">
      	</div>
      	<div>
        <br>
    
      		<button class="w3-button w3-purple" type="submit" name="upload">Importar</button>
          </center>
      	</div>
      </form>
    </div>
  </body>
</html>