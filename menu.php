<?php
    session_start();
    if( isset($_SESSION['chave'])) {
        if ($_SESSION['chave'] == 'Teste123#') {
            echo "Seja bem-vindo(a), <b>".$_SESSION['usuario']."!</b>".' <a href="https://pc-dev-nercolini.000webhostapp.com/suspeitos/logout.php" onclick= "return Handler(this, event);">Sair</a>';
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <title>Caça-Suspeitos</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <header>
        <div class="brand">
            <p>devigo</p>
        </div>
        <div class="title">
            <h1>Caça-Suspeitos</h1>
        </div>
        <div class="off-button">
            <a href="https://pc-dev-nercolini.000webhostapp.com/suspeitos/logout.php" onclick= "return Handler(this, event);"><img src="images/bottonoff.png" widht="30px" height="30px">Encerrar</a></a>
        </div>
    </header>
    <section>
        <nav>
            <div class="menu-button-container">
                <a href="consulta.html" target="iframe_a" class="menu-button"><span>Consultar</span></a>
                <a href="filtrar.html" target="iframe_a" class="menu-button"><span>Filtrar</span></a>
                <a href="form_editar.html" target="iframe_a" class="menu-button"><span>Editar</span></a>
                <a href="cadsusp.html" target="iframe_a" class="menu-button"><span>Cadastrar</span></a>
            </div>
        </nav>
        <article>
            <iframe src="" name="iframe_a" style="border: none; margin: 0px;" height="100%" width="100%" title="ConteÃºdo"></iframe>
        </article>
    </section>
    <footer>
        <h6>by Rodrigo Nercolini | 2023</h6>
        <a href="https://www.linkedin.com/in/rodrigo-nercolini-480630221" target="_blank"><img src="images/linkedin.png" alt="LinkedIn" style="width: 20px; height: 20px;"></a>
    </footer>
</body>
</html>
<?php
        }    
    
        else {
            echo "Acesso indevido!";
        }
        
    }
    else{
        echo "Acesso indevido";
    }
?>
