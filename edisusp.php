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
    
            $sql = "SELECT idade, sexo, altura, cabelos_cor, olhos_cor, barba, tatoos, oculos, cicatrizes, pes_tam FROM suspeitos WHERE nome ='$var1';";
    
            $resultado = mysqli_query($con,$sql);
            
            if (mysqli_num_rows($resultado) > 0){
                $row = mysqli_fetch_assoc($resultado);
?>   
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <title>Controle de atrasos</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/content.css">
</head>
<body>
    <form action = "https://pc-dev-nercolini.000webhostapp.com/suspeitos/atususp.php" method="post">    
    <h3>Alterar Cadastro</h3>
    <tr><td>Nome: </td><td><?php echo '<b>'.$var1.'</b>';?></td></tr>
    <input class="inputtx" type="hidden" id="nome" name="nome" value= "<?php echo $var1;?>">
    <tr><td><br><br>Idade:</td><br><td><input class="inputtx" type="text" name="idade" maxlength="3"
                        value="<?php echo $row['idade']; ?>"></td></tr>
    <tr><td><br><br>Sexo:</td><br><td>
                        <select name="sexo">
                        <option <?php echo $row['sexo']=='Feminino'?'selected ':'';?>value="Feminino">Feminino</option>    
                        <option <?php echo $row['sexo']=='Masculino'?'selected ':'';?>value="Masculino">Masculino</option>
                        </select></td></tr>
    <tr><td><br><br>Altura:</td><br><td>
                        <select name="altura">
                        <option <?php echo $row['altura']=='Baixo'?'selected ':'';?>value="Baixo">Baixo</option>    
                        <option <?php echo $row['altura']=='Médio'?'selected ':'';?>value="Médio">Médio</option>
                        <option <?php echo $row['altura']=='Alto'?'selected ':'';?>value="Alto">Alto</option>
                        </select></td></tr>
    <tr><td><br><br>Cor dos Cabelos:</td><br><td>
                        <select name="cabelos_cor">
                        <option <?php echo $row['cabelos_cor']=='Ruivo'?'selected ':'';?>value="Ruivo">Ruivo</option>    
                        <option <?php echo $row['cabelos_cor']=='Preto'?'selected ':'';?>value="Preto">Preto</option>
                        <option <?php echo $row['cabelos_cor']=='Castanho'?'selected ':'';?>value="Castanho">Castanho</option>
                        <option <?php echo $row['cabelos_cor']=='Loiro'?'selected ':'';?>value="Loiro">Loiro</option>
                        </select></td></tr>
    <tr><td><br><br>Cor dos Olhos:</td><br><td>
                        <select name="olhos_cor">
                        <option <?php echo $row['olhos_cor']=='Azul'?'selected ':'';?>value="Azul">Azul</option>    
                        <option <?php echo $row['olhos_cor']=='Verde'?'selected ':'';?>value="Verde">Verde</option>
                        <option <?php echo $row['olhos_cor']=='Castanho'?'selected ':'';?>value="Castanho">Castanho</option>
                        </select></td></tr>
    <tr><td><br><br>Barba:</td><br><td>
                        <select name="barba">
                        <option <?php echo $row['barba']=='Sim'?'selected ':'';?>value="Sim">Sim</option>    
                        <option <?php echo $row['barba']=='Não'?'selected ':'';?>value="Não">Não</option>
                        </select></td></tr>
    <tr><td><br><br>Tatoos:</td><br><td>
                        <select name="tatoos">
                        <option <?php echo $row['tatoos']=='Sim'?'selected ':'';?>value="Sim">Sim</option>    
                        <option <?php echo $row['tatoos']=='Não'?'selected ':'';?>value="Não">Não</option>
                        </select></td></tr>
    <tr><td><br><br>Óculos:</td><br><td>
                        <select name="oculos">
                        <option <?php echo $row['oculos']=='Sim'?'selected ':'';?>value="Sim">Sim</option>    
                        <option <?php echo $row['oculos']=='Não'?'selected ':'';?>value="Não">Não</option>
                        </select></td></tr
    <tr><td><br><br>Cicatrizes:</td><br><td>
                        <select name="cicatrizes">
                        <option <?php echo $row['cicatrizes']=='Sim'?'selected ':'';?>value="Sim">Sim</option>    
                        <option <?php echo $row['cicatrizes']=='Não'?'selected ':'';?>value="Não">Não</option>
                        </select></td></tr>
    <tr><td><br><br>Tamanho dos Pés:</td><br><td>
                        <select name="pes_tam">
                        <option <?php echo $row['pes_tam']=='Pequeno'?'selected ':'';?>value="Pequeno">Pequeno</option>    
                        <option <?php echo $row['pes_tam']=='Médio'?'selected ':'';?>value="Médio">Médio</option>
                        <option <?php echo $row['pes_tam']=='Grande'?'selected ':'';?>value="Grande">Grande</option>
                        </select></td></tr>
    <br>
    <br>
    <tr><td></td><td><input type ="submit" formtarget="_self" value="GRAVAR"></td></tr>
    </form>
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