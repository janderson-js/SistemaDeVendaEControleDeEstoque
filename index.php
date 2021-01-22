<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/formata.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    </head>
    <body>
        <div id="pagina">
            <!-- DIV TOP -->
            <div id="top">
                <!-- DIV LOGO -->
                <div id="logo">
                     <img alt="imagem logo" src="img/log2.png" width="60" heigth="60">
                </div>
            </div>
            <!-- DIV CONTEUDO -->
            <div id="conteudo">
                <!-- DIV CENTRO -->
                <div id="centro">
                    <h1>Acesso a Area Restrita</h1>
                    <h6>Entre com as Informações do Usuario</h6>
                    <!-- DIV FORM -->
                    <div id="form"> 
                        <form method="post" action="processa_login.php">
                            <label for="" class="lbl">
                                <i class="fas fa-user"></i>
                                <input type="text" name="login" placeholder="Login:" required>
                            </label>
                            <label for="" class="lbl">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="senha" placeholder="******" required>
                            </label>
                            <input type="submit" value="Entrar"  id="btn">
                        </form>
                    </div>
                </div>
            </div>
            <!-- DIV RODAPE -->
            <div id="rodape"> 
                asa
            </div>
        </div>
    </body>
</html>