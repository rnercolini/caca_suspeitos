<?php
    session_start();
    if( isset($_SESSION['chave'])) {
        if ($_SESSION['chave'] == 'Teste123#') {
            
            if (!include("../Xal4Raty8ba22.php")) {
                die('Arquivo de configurações indisponível!');
                }
    
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
    
                $con= mysqli_connect($xdb_server,$xdb_user,$xdb_pass,$xdb_name);
                if (!$con) {
                die('Conector inativo:' . mysqli_connect_error());
        
                }
                $charset = mysqli_query($con, "SET NAMES 'utf8'");
    
                $sql = "UPDATE suspeitos SET idade='$var2', sexo='$var3', altura='$var4', cabelos_cor='$var5', olhos_cor='$var6', barba='$var7', tatoos='$var8', oculos='$var9', cicatrizes='$var10', pes_tam='$var11' where nome='$var1';";
                $resultado = mysqli_query($con,$sql);
    
                if(mysqli_query($con,$sql)){
                echo "Atualizado com sucesso!";    
                }     
                else {
                echo "Erro: " .$sql. "<br>" .mysqli_error($con);
                echo $sql;
                }
                mysqli_close($con);
            exit(0);

        }    
    
        else {
            echo "Acesso indevido!";
        }
    }
    else{
        echo "Acesso indevido";
    }
?>
