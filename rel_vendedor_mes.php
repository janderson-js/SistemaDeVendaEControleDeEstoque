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
                    <h1>Vendas Realizadas</h1>
                    <div id="lista_fun">
                        <?php 
                            $cod_fun = $_SESSION["cod_fun"];
                            date_default_timezone_set('America/Sao_Paulo');
                            $data = date('d/m/Y');

                            $conectar = mysqli_connect ("localhost", "root", "", "tech_note");

                            $sql_melhor_do_mes = "SELECT  COUNT( Funcionario_cod_fun)
                                                      FROM venda
                                                      GROUP BY Funcionario_cod_fun
                                                      HAVING (COUNT(*) > 0)
                                                      ";
                           
						
                            $resultado_consulta = mysqli_query ($conectar, $sql_melhor_do_mes);

                            
                            $sql_cod_melhor_do_mes = "SELECT Funcionario_cod_fun, COUNT( Funcionario_cod_fun)
                                                FROM venda
                                                GROUP BY Funcionario_cod_fun
                                                HAVING (COUNT(*) > 0)
                                                ";

                            $resultado_consulta_cod = mysqli_query ($conectar, $sql_cod_melhor_do_mes);

                            
                        ?>
                        <div class="tabela">
                            <table class="tabela_fun" id="estilo_tabela">
                                <thead>
                                    <tr>
                                        <td class="centralizar"> <p> Funcionarios </p> </td>
                                        <td class="centralizar"> <p> Nº de Vendas </p> </td>
                                    </tr>
                                </thead>
                                <?php 
                                $valorTotal = 0;
                                while(($dados_melhor_do_mes = mysqli_fetch_row ($resultado_consulta))){
                                    $dados_cod_fun = mysqli_fetch_row($resultado_consulta_cod);
                                    
                                    $sql_consulta_nome = "SELECT nome_fun, sobre_nome_fun From funcionarios 
                                                            WHERE cod_fun = '$dados_cod_fun[0]'";
                                    $resultado_consulta_nome = mysqli_query ($conectar, $sql_consulta_nome);

                                    $nome_fun = mysqli_fetch_row( $resultado_consulta_nome);
                                ?>
                                <tr>
                                    <td class="centralizar" > <p> 
                                            <?php 
                                                echo "$nome_fun[0]"." $nome_fun[1]";
                                            ?>
                                    </p> </td>
                                    <td class="centralizar"> <p> 
                                    <?php 
                                              echo "$dados_melhor_do_mes[0]" ;
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