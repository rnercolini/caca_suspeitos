<?php
    //var_dump($_POST);
 
    date_default_timezone_set('America/Sao_Paulo');

    if (!include("../Xal4Raty8ba22.php")) {
        die('Arquivo de configurações indisponível!');
    }

    $var1 = $_POST["idadeini"];
    $var2 = $_POST["idadefim"];
    $var3 = $_POST["sexo"];
    $var4 = $_POST["altura"];
    $var5 = $_POST["cabelos_cor"];
    $var6 = $_POST["olhos_cor"];
    $var7 = $_POST["barba"];
    $var8 = $_POST["tatoos"];
    $var9 = $_POST["oculos"];
    $var10 = $_POST["cicatrizes"];
    $var11 = $_POST["pes_tam"];
    
    $sql="SELECT nome FROM suspeitos WHERE idade>=$var1 AND idade<=$var2 AND ";
    
    if( strlen($var3) !=0 ) { $sql.="sexo='$var3' AND ";             }
    if( strlen($var4) !=0 ) { $sql.="altura='$var4' AND ";           }
    if( strlen($var5) !=0 ) { $sql.="cabelos_cor='$var5' AND ";      }
    if( strlen($var6) !=0 ) { $sql.="olhos_cor='$var6' AND ";        }
    if( strlen($var7) !=0 ) { $sql.="barba='$var7' AND ";            }
    if( strlen($var8) !=0 ) { $sql.="tatoos='$var8' AND ";           }
    if( strlen($var9) !=0 ) { $sql.="oculos='$var9' AND ";           }
    if( strlen($var10) !=0 ) { $sql.="cicatrizes='$var10' AND ";     }
    if( strlen($var11) !=0 ) { $sql.="pes_tam='$var11' AND ";        }
    
    if(substr($sql,-4)=='AND ') { $sql = substr($sql,0,-4);}
    
    $sql.=';';
    
    $con= mysqli_connect($xdb_server,$xdb_user,$xdb_pass,$xdb_name);
    if (!$con) {
        die('Conector inativo:'. mysqli_connect_error());
    }
    
    $charset = mysqli_query($con,"SET NAMES 'utf8'");
    $resultado = mysqli_query($con,$sql);
    $qts=0;
  
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/content.css">
</head>
<body>
    <table aling="center">
        <h3>Suspeitos Encontrados</h3>
        <?php
            while($row = mysqli_fetch_assoc($resultado)){
                echo '<tr><td>'.$row["nome"].'</td>
                <td><a href="https://pc-dev-nercolini.000webhostapp.com/suspeitos/detalhe.php?nome='.$row["nome"].'"><button>Detalhes</button></a></td></tr>';
                $qts++;
            }
            echo "<tr><td><b>$qts</b> registros processados.</td></tr>";
        ?>
    </table>
</body>
</html>
<?php
   mysqli_close($con);
   exit(0);
?>
