<?php
    session_start();
    if( isset($_SESSION['chave'])) {
        if ($_SESSION['chave'] == 'Teste123#') {
    
            $var1 =  $_POST["nome"];
   
            date_default_timezone_set('America/Sao_Paulo');
    
            if (!include("../Xal4Raty8ba22.php")) {
                die('Arquivo de configurações indisponível!');
            }
            
            $con= mysqli_connect($xdb_server,$xdb_user,$xdb_pass,$xdb_name);
            
            if (!$con) {
                die('Conector inativo:'. mysqli_connect_error());
            }
    
            $charset = mysqli_query($con,"SET NAMES 'utf8'");
    
            $sql = "SELECT nome, idade, sexo, altura, cabelos_cor, olhos_cor, barba, tatoos, oculos, cicatrizes, pes_tam FROM suspeitos WHERE nome ='$var1';";
    
            $resultado = mysqli_query($con,$sql);
    
            if (mysqli_num_rows($resultado) > 0){
                $row = mysqli_fetch_assoc($resultado);
?>   
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/content.css">
    <title>Consulta Suspeitos</title>
</head>
<body>
    <div>
    <table>
    <tr><td>Nome: </td><td><?php echo '<b>'.$row["nome"].'</b>';?></td></tr>
    <tr><td>Idade: </td><td><?php echo '<b>'.$row["idade"].'</b>';?></td></tr>
    <tr><td>Sexo: </td><td><?php echo '<b>'.$row["sexo"].'</b>';?></td></tr>
    <tr><td>Altura: </td><td><?php echo '<b>'.$row["altura"].'</b>';?></td></tr>
    <tr><td>Cor dos cabelos: </td><td><?php echo '<b>'.$row["cabelos_cor"].'</b>';?></td></tr>
    <tr><td>Cor dos olhos: </td><td><?php echo '<b>'.$row["olhos_cor"].'</b>';?></td></tr>
    <tr><td>Barba: </td><td><?php echo '<b>'.$row["barba"].'</b>';?></td></tr>
    <tr><td>Tattoos: </td><td><?php echo '<b>'.$row["tatoos"].'</b>';?></td></tr>
    <tr><td>Óculos: </td><td><?php echo '<b>'.$row["oculos"].'</b>';?></td></tr>
    <tr><td>Cicatrizes: </td><td><?php echo '<b>'.$row["cicatrizes"].'</b>';?></td></tr>
    <tr><td>Tamanho dos pés: </td><td><?php echo '<b>'.$row["pes_tam"].'</b>';?></td></tr>
    </table>
    </div>
</body>
</html>

<?php
        mysqli_close($con);
        exit(0);
        }
        else{
            mysqli_close($con);
            die("Nome não encontrado!");
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