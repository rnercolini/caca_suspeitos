<?php
    session_start();
    if( isset($_SESSION['chave'])) {
        if ($_SESSION['chave'] == 'Teste123#') {
            $var1=$_POST["nome"];
            $var2=$_POST["idade"];
            $var3=$_POST["sexo"];
            $var4=$_POST["altura"];
            $var5=$_POST["cabelos_cor"];
            $var6=$_POST["olhos_cor"];
            $var7=$_POST["barba"];
            $var8=$_POST["tatoos"];
            $var9=$_POST["oculos"];
            $var10=$_POST["cicatrizes"];
            $var11=$_POST["pes_tam"];
    
            date_default_timezone_set('America/Sao_Paulo');
    
            if (!include("../Xal4Raty8ba22.php")) {
                die('Arquivo de configurações indisponível!');
            }
    
            $con= mysqli_connect($xdb_server,$xdb_user,$xdb_pass,$xdb_name);
            if (!$con) {
                die('Conector inativo:' . mysqli_connect_error());
            }
            $charset = mysqli_query($con, "SET NAMES 'utf8'");
    
            $sql = "SELECT count(*) as qts FROM suspeitos WHERE nome='$var1';";
            $resultado = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($resultado);
            $qts = $row["qts"];
    
            if( $qts == 0 ) {
            $sql = "INSERT INTO suspeitos (nome, idade, sexo, altura, cabelos_cor, olhos_cor, barba, tatoos, oculos, cicatrizes, pes_tam) values ".
            "('$var1', '$var2', '$var3', '$var4', '$var5','$var6', '$var7', '$var8', '$var9', '$var10', '$var11');";
           
                if (mysqli_query($con, $sql)) {
                    echo '<script>alert("Registro inserido com sucesso!")</script>';
                }
                else {
                    echo "Erro: " . $sql . "<br>" . mysqli_error($con);
                }
            }
            else {
                mysqli_close($con);
                die("Suspeito já cadastrado!");
            }
        }    
    
        else {
            echo "Acesso indevido!";
        }
        
    }
    else{
        echo "Acesso indevido";
    }

?>