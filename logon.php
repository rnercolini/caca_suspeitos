<?php
    date_default_timezone_set('America/Sao_Paulo');
    
    if (!include("../Xal4Raty8ba22.php")) {
        die('Arquivo de configurações indisponível!');
    }
    
    $var1 = $_POST["usuario"];
    $var2 = $_POST["senha"];
    
    $con = mysqli_connect($xdb_server, $xdb_user, $xdb_pass, $xdb_name);
    if (!$con) {
        die('Conector inativo: ' . mysqli_connect_error());
    }
    $charset = mysqli_query($con, "SET NAME 'utf8'");
    
    $sql = "SELECT COUNT(*) AS qts FROM usuarios WHERE usuario='$var1' AND senha='$var2' AND ativo='S';";
    
    $resultado = mysqli_query($con, $sql);
    
    $row = mysqli_fetch_assoc($resultado);
    
    if( $row["qts"]==1) {
        session_start();
        $_SESSION['chave'] = 'Teste123#';
         $_SESSION['usuario'] = $var1;
        header("Location: https://pc-dev-nercolini.000webhostapp.com/suspeitos/menu.php");
    }
    
    else {
        mysqli_close($con);
        die('Dados incorretos!');
    }
    
    mysqli_close($con);
    exit(0);
?>
