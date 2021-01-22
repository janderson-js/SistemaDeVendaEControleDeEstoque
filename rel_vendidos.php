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
                    <h1>Notebooks Vendidos</h1>
                    <div id="lista_fun">
                        <?php 
                            $cod_fun = $_SESSION["cod_fun"];
                            date_default_timezone_set('America/Sao_Paulo');

                            $conectar = mysqli_connect ("localhost", "root", "", "tech_note");

                            $sql_consulta_total_vendas = "SELECT cod_note,marca_note, modelo_note, preco_note
													  FROM notebooks
                                                      WHERE fila_compra_note = 'V'";

                            $resultado_consulta = mysqli_query ($conectar, $sql_consulta_total_vendas);
                            
                        ?>
                        <div class="tabela">
                            <table class="tabela_fun" id="estilo_tabela">
                                <thead>
                                    <tr>
                                        <td class="esqueda"> <p> Marca </p> </td>
                                        <td class="centralizar"> <p> Modelo </p> </td>
                                        <td class="centralizar"> <p> Preço </p> </td>
                                        <td class="centralizar"> <p> Data </p> </td>
                                    </tr>
                                </thead>
                                <?php 
                                $valorTotal = 0;
                                while(($dados_total_vendas = mysqli_fetch_row ($resultado_consulta))){

                                    $sql_consulta_cod_venda = "SELECT Venda_cod_venda FROM notebooks WHERE fila_compra_note = 'V'";
                                    
                                    $resultado_consulta_cod_venda = mysqli_query ($conectar, $sql_consulta_cod_venda);
                                    
                                    $cod_venda = mysqli_fetch_row($resultado_consulta_cod_venda);
                                    

                                    $sql_consulta_data_venda = "SELECT data_venda FROM venda WHERE Funcionario_cod_fun = '$cod_venda[0]'";
                                    
                                    $resultado_consulta_data = mysqli_query($conectar,$sql_consulta_data_venda);
                                    
                                    $data_venda = mysqli_fetch_row($resultado_consulta_data);
                                ?>
                                <tr>
                                    <td class="centralizar" > <p> 
                                        <?php 
                                            echo "$dados_total_vendas[1]";
                                        ?>
                                    </p> </td>
                                    <td class="centralizar"> <p> 
                                        <?php 
                                            echo "$dados_total_vendas[2]";
                                        ?>
                                    </p> </td>
                                    <td class="centralizar"> <p> 
                                        <?php 
                                            echo "$dados_total_vendas[3]";
                                            $valorTotal = $valorTotal + $dados_total_vendas[3];
                                        ?>
                                    </p> </td>
                                    <td class="centralizar"> <p>
                                            <?php echo "$data_venda[0]"?>
                                        </p> 
                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                                <tr class="centralizar">
                                    <td colspan="3">valor arrecadado</td>
                                    <td>  <?php echo $valorTotal; ?>$ </td>
                                </tr>
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