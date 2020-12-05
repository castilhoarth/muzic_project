<?php
    include 'config.php';
    include 'SQLExecute.php';
    $con = conectar();
    mysql_select_db('bd_tcc');
    mysql_set_charset('utf8');

    session_start();

    $_SESSION['email'] = "";
    $_SESSION['senha'] = "";

    $cod_user = $_SESSION['cod_usuario'];

    $nome = $_POST["nome"];
    $tipo = $_POST["tipo"];
    $data = $_POST["idade"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $estado = $_POST["estado"];
    $tel = $_POST["tel"];
    
    $sql = "SELECT * FROM tb_usuario where email like '$email' AND senha like '$senha' ";
    $res = SQLExecute($con,$sql);
    $row = mysql_fetch_array($res);

    $sql="UPDATE tb_usuario SET nome_usuario = '$nome', tipo_usuario = '$tipo', data = '$data', email = '$email', senha = '$senha', celular = '$tel', estado = '$estado' WHERE cod_usuario like '$cod_user'";

    $res = SQLExecute($con,$sql);

    ?>
    
    alert ("Perfil alterado com sucesso");
    
    <?php
    header("location:/Principal/Perfil.php");

    $_SESSION['cod_usuario'] = $cod_user;
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
?>