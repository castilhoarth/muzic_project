<?php
    include 'config.php';
    include 'SQLExecute.php';
    $con = conectar();
    mysql_select_db('bd_tcc');
    mysql_set_charset('utf8');

    session_start();

    $cod_user = $_SESSION['cod_usuario'];

    $nome_formacao = $_POST["nome_formacao"];
    $instituicao = $_POST["instituicao"];
    $tipo_curso = $_POST["tipo_curso"];
    $dt_inicio = $_POST["dt_inicio"];
    $dt_termino = $_POST["dt_termino"];
   
    /*RECEBENDO VARIÁVEIS DE USUÁRIO*/

  $sql = "SELECT * FROM tb_usuario where cod_usuario like '$cod_user' ";
  $res = SQLExecute($con,$sql);
  $row_user = mysql_fetch_array($res);

  $cod_user = $row_user['cod_usuario'];

  /*RECEBENDO VARIÁVEIS DE FORMAÇÃO*/

  $sql = "SELECT * FROM tb_form_usuario where cod_usuario like '$cod_user'";
  $res = SQLExecute($con,$sql);
  $row_form = mysql_fetch_array($res);

  $cod_form = $row_form['cod_formacao'];

  /*RECEBENDO VARIÁVEIS DE FORMAÇÃO-USUÁRIO*/

    $sql="UPDATE tb_form_usuario SET data_inicio = '$dt_inicio', data_conclusao = '$dt_termino' WHERE cod_usuario like '$cod_user' AND cod_formacao like '$cod_form' ";

    $res = SQLExecute($con,$sql);

    $sql="UPDATE tb_formacao SET nome_formacao = '$nome_formacao', instituicao = '$instituicao', tipo_curso = '$tipo_curso' WHERE  cod_formacao like '$cod_form'";

    $res = SQLExecute($con,$sql);


    ?>
    
    alert ("Perfil alterado com sucesso");
    
    <?php
    header("location:/Principal/Perfil.php");

    $_SESSION['cod_usuario'] = $cod_user;
?>