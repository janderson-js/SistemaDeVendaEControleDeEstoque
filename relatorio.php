<?php 
	session_start ();
?>
<html!>
    <head>
        <link rel="stylesheet" type="text/css" href="css/formata.css">
        <link rel="stylesheet" type="text/css" href="css/menu.css">
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
                <!-- DIV CONTEUDO-->
            <div id="conteudo">
                 <!-- DIV CONTEUDO ESPECIFICO -->
                <div id="conteudo_especifico">
                    <ul id="menu_conteudo">
                        <li>Olá, <?php include "valida_login.php";?> </li>
                    </ul>
                    <h1>Relatório</h1>
                    <div id="cont_administracao">
                        <ul id="menu_administracao">
                            <li><a href="administracao.php"> Administração </a></li>
                            <li><a href="rel_funcionarios.php"> Relatório de Funcionários </a></li>
                            <li><a href="rel_estoque.php"> Relatório de Notebooks em estoque </a></li>
                            <li><a href="rel_vendidos.php"> Relatório de Notebooks Vendidos </a></li>
                            <li><a href="rel_vendedor_mes.php"> Relatório de Vendas Realizadas</a></li>
                            <li><a href="rel_total_vendas.php"> Faturamento total do mês </a></li>
                            <li><a href="logout.php">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
                <!-- DIV RODAPE-->
            <div id="rodape">
                asdassda
            </div>
        </div>
    </body>
</html!>