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
                    <h1>Funcionarios</h1>
                   <a href="cadastra_fun.php" id="cadastra_fun">Cadastrar funcionario</a>
                    <div id="lista_fun">
                        <?php 
                            $conecta = mysqli_connect("localhost","root","","tech_note");
                            $sql_consulta = "SELECT cod_fun, nome_fun, sobre_nome_fun,
                                rg_fun, cpf_fun, funcao_fun, status_fun FROM funcionarios";

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
                                        <td class="centralizar"> <p> Ação </p> </td>
                                    </tr>
                                </thead>
                                <?php 
                                while($dados = mysqli_fetch_row($result_consulta)){

                                ?>
                                <tr>
                                    <td class="esqueda" > <p> 
                                        <a href="exibe_fun.php?cod=<?php echo $dados[0] ?>">
                                            <?php 
                                                echo "$dados[1]";
                                            ?>
                                        </a>
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
                                    <td class="centralizar"> <p>
                                        <a href="altera_fun.php?cod=<?php echo $dados[0]?>">
                                            Alterar	
                                        </a>
                                    </p> </td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </table>
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