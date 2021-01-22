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
                    <h1>Notebooks</h1>
                    <div id="lista_fun">
                        <?php 
                            $conecta = mysqli_connect("localhost","root","","tech_note");
                            $sql_consulta = "SELECT cod_note, marca_note, modelo_note, preco_note FROM notebooks
                            WHERE fila_compra_note = 'N'";

                            $result_consulta = mysqli_query($conecta, $sql_consulta);
                        ?>
                        <div class="tabela">
                            <table class="tabela_fun" id="estilo_tabela">
                                <thead>
                                    <tr>
                                        <td class="esqueda"> <p> Marca </p> </td>
                                        <td class="centralizar"> <p> Modelo </p> </td>
                                        <td class="centralizar"> <p> Preço </p> </td>
                                        <td class="centralizar"> <p> Ação </p> </td>
                                    </tr>
                                </thead>      
                                <?php 
                                while($dados = mysqli_fetch_row($result_consulta)){

                                ?>
                                <tr>
                                    <td class="esqueda" > <p> 
                                        <a href="exibe_note.php?cod=<?php echo $dados[0] ?>">
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
                                            echo "$dados[3]";
                                        ?>
                                    </p> </td>
                                    <td class="centralizar"> <p>
                                        <a href="fila_compra.php?cod=<?php echo $dados[0]?>">
                                            Colocar na Fila	
                                        </a>
                                    </p> </td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </table>
                            <a href="ver_fila_compra.php" id="fila_compra">Ver fila de compras</a>
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