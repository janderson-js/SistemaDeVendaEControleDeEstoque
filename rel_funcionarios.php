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
                <!-- DIV MENU LATERAL -->
                <div id="menu_lateral">
                    <div class="menu_lateral">
                        <?php include "menu.php" ?>
                    </div>
                </div>
                    <!-- DIV CONTEUDO ESPECIFICO -->
                <div id="conteudo_especifico">
                    <ul id="menu_conteudo">
                        <li>Olá, <?php include "valida_login.php";?> </li>
                    </ul>
                    <h1>Funcionarios ativos</h1>
                    <div id="lista_fun">
                        <?php 
                            $conecta = mysqli_connect("localhost","root","","tech_note");
                            $sql_consulta = "SELECT cod_fun, nome_fun, sobre_nome_fun,
                                rg_fun, cpf_fun, funcao_fun, status_fun FROM funcionarios
                                WHERE status_fun <> 'inativo'";

                            $result_consulta = mysqli_query($conecta, $sql_consulta);
                        ?>
                        <div class="tabela">
                            <table class="tabela_fun" id="estilo_tabela">
                                <thead>
                                    <tr>
                                        <td class="esqueda"> <p> Nome </p> </td>
                                        <td class="centralizar"> <p> Sobrenome </p> </td>
                                        <td class="centralizar"> <p> Função </p> </td>
                                        <td class="centralizar"> <p> Status </p> </td>
                                    </tr>
                                </thead>
                                <?php 
                                while($dados = mysqli_fetch_row($result_consulta)){

                                ?>
                                <tr>
                                    <td class="esqueda" > <p> 
                                        <?php 
                                            echo "$dados[1]";
                                        ?>
                                    </p> </td>
                                    <td class="centralizar"> <p> 
                                        <?php 
                                            echo "$dados[2]";
                                        ?>
                                    </p> </td>
                                    <td class="centralizar"> <p> 
                                        <?php 
                                            echo "$dados[5]";
                                        ?>
                                    </p> </td>
                                    <td class="centralizar"> <p>
                                        <?php 
                                            echo "$dados[6]";
                                        ?>
                                    </p> </td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </table>
                            <a href="relatorio.php" id="fechar_recibo">Voltar ao menu de relatorios</a>
                        </div>
                    </div>
                </div>
            </div>
                <!-- DIV RODAPE-->
            <div id="rodape">
                asda ada
            </div>
        </div>
    </body>
</html!>