<?php
    include 'config.php';
    include 'SQLExecute.php';
    $con = conectar();
    mysql_select_db('bd_tcc');
    mysql_set_charset('utf8');

    session_start();

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    
    $cod_user = $_SESSION['cod_usuario'];

    $descricao = $_POST["descricao"];


    $sql = "SELECT * FROM tb_usuario where email like '$email' AND senha like '$senha' ";

    $res = SQLExecute($con,$sql);
    $row = mysql_fetch_array($res);

    
    $sql="UPDATE tb_experiencia SET descricao = '$descricao' WHERE cod_usuario like '$cod_user'";

    $res = SQLExecute($con,$sql);

    ?>
    <script type="text/javascript">
    alert ("Perfil alterado com sucesso");
    </script>
    <?php
    header("location:/Principal/Perfil.php");

    $_SESSION['cod_usuario'] = $cod_user;
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
?>