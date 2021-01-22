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
                    <h1>Recibo</h1>
                    <div id="lista_fun">
                        <?php 
                            $cod_fun = $_SESSION["cod_fun"];
                            date_default_timezone_set('America/Sao_Paulo');
                            $data = date('d/m/Y');

                            $conecta = mysqli_connect("localhost","root","","tech_note");

                            $sql_consulta = "SELECT cod_note, marca_note, modelo_note, preco_note FROM notebooks
                            WHERE Venda_cod_venda IS NULL AND fila_compra_note = 'S'";

                            $sql_consulta_fun = "SELECT nome_fun, sobre_nome_fun FROM Funcionarios
                            WHERE cod_fun = '$cod_fun'";

                            $slq_cadastra_venda = "INSERT INTO venda (`cod_venda`,`data_venda`,`Funcionario_cod_fun`)
                                                    VALUES (NULL,'$data','$cod_fun')";
                            $result_cadastra_venda = mysqli_query($conecta,$slq_cadastra_venda);

                            $result_consulta = mysqli_query($conecta, $sql_consulta);

                            $result_consulta_fun = mysqli_query($conecta,$sql_consulta_fun);

                            $sql_ultima_venda = "SELECT cod_venda, data_venda FROM venda ORDER BY cod_venda DESC LIMIT 1";

                            $resul_ultima_venda = mysqli_query($conecta,$sql_ultima_venda);

                            $dados_ultima_venda = mysqli_fetch_row($resul_ultima_venda);

                            $dados_fun = mysqli_fetch_row($result_consulta_fun);

                            $sql_seta_cod_venda = "UPDATE notebooks 
                                                    SET Venda_cod_venda = '$dados_ultima_venda[0]',
                                                        fila_compra_note = 'V'
                                                    WHERE fila_compra_note ='S'";
                            $result_alteracao = mysqli_query($conecta,$sql_seta_cod_venda);
                        ?>
                        <div class="tabela">
                            <table class="tabela_fun" id="estilo_tabela">
                                <thead>
                                    <tr>
                                        <td class="esqueda"> <p> Codigo da venda </p> </td>
                                        <td class="centralizar"> <p> Funcionario </p> </td>
                                        <td class="centralizar"> <p> Data </p> </td>
                                        <td class="centralizar"> <p> Marca </p> </td>
                                        <td class="centralizar"> <p> Modelo </p> </td>
                                        <td class="centralizar"> <p> Preço </p> </td>
                                    </tr>
                                </thead>
                                <?php 
                                $valorTotal = 0;
                                while($dados = mysqli_fetch_row($result_consulta)){

                                ?>
                                <tr>
                                    <td class="centralizar" > <p> 
                                        <a href="exibe_note.php?cod=<?php echo $dados[0] ?>">
                                            <?php 
                                                echo "$dados_ultima_venda[0]";
                                            ?>
                                        </a>
                                    </p> </td>
                                    <td class="centralizar"> <p> 
                                        <?php 
                                            echo "$dados_fun[0] "."$dados_fun[1]";
                                        ?>
                                    </p> </td>
                                    <td class="centralizar"> <p> 
                                        <?php 
                                            echo date('d/m/Y');
                                        ?>
                                    </p> </td>
                                    <td class="centralizar"> <p>
                                        <?php echo $dados[1]?>
                                        </p> 
                                    </td>
                                    <td class="centralizar"> <p>
                                            <?php echo $dados[2]?>
                                        </p> 
                                    </td>
                                    <td class="centralizar"> <p>
                                            <?php echo $dados[3];
                                            $valorTotal = $valorTotal + $dados[3];?>
                                        </p> 
                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                                <tr class="centralizar">
                                    <td colspan="5">Valor Pago </td>
                                    <td>  <?php echo $valorTotal; ?>$ </td>
                                </tr>
                            </table>
                            <a href="venda.php" id="fechar_recibo">Fechar recibo</a>
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