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
                    <h1>Dados do funcionario</h1>
                    <div id="lista_fun">
                    <a href="funcionarios.php" id="volta"> voltar </a>
                        <div id="exibe_fun">
                            <?php 
                                $cod = $_GET["cod"];

                                $conecta = mysqli_connect("localhost","root","","tech_note");

                                $sql_consulta = "SELECT * FROM funcionarios
                                    WHERE cod_fun = '$cod'";

                                $sql_consulta_telefone = "SELECT * FROM telefone
                                                            WHERE Funcionario_cod_fun = '$cod'";

                                $sql_consulta_endereco = "SELECT * FROM endereco
                                                            WHERE Funcionario_cod_fun = '$cod'";
                                    
                                $result_consulta = mysqli_query($conecta, $sql_consulta);

                                $result_consulta_telefone = mysqli_query($conecta,$sql_consulta_telefone);

                                $result_consulta_endereco = mysqli_query($conecta,$sql_consulta_endereco);

                                $dados = mysqli_fetch_row($result_consulta);
                                
                                $dados_telefone = mysqli_fetch_row($result_consulta_telefone);

                                $dados_endereco = mysqli_fetch_row($result_consulta_endereco);

                            ?>

                            <div class="exibe_dados">

                            <?php if($dados[8] =="administrador") {?>
                                <table id="exibe_dados" class="margin">
                                    <tr>
                                        <td id="menor"><p> Nome:</p></td>
                                        <td id="maior"><?php echo $dados[1]." ".$dados[2];?></td>
                                    </tr>
                                    <tr>
                                        <td id="menor"> <p>Função:</p></td>
                                        <td id="maior"> <?php echo $dados[8];?></td>
                                    </tr>
                                    <tr>
                                        <td id="menor"><p> Status </p></td>
                                        <td id="maior"><p><?php echo $dados[9];?></p></td>
                                    </tr>
                                    <tr>
                                        <td id="menor"><p>Login:</p></td>
                                        <td id="maior"><?php echo $dados[6];?></td>
                                    </tr>
                                </table>
                            <?php }else{?>
                                <table id="exibe_dados">
                                    <tr>
                                        <td id="menor">
                                            <p>
                                                Nome:
                                            </p>
                                        </td>
                                        <td id="maior">
                                            <p>
                                               <?php echo $dados[1]." ".$dados[2];?>    
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="menor"> Telefone de Contato:</td>
                                        <td id="maior"><p> <?php echo $dados_telefone[2];?> </p></td>
                                    </tr>
                                    <tr>
                                        <td id="menor"> Telefone:</td>
                                        <td id="maior"> <p> <?php echo $dados_telefone[3]; ?> </p> </td>
                                    </tr>
                                    <tr>
                                        <td id="menor">
                                            <p>
                                                Login:
                                            </p>
                                        </td>
                                        <td id="maior">
                                            <p>
                                                <?php echo $dados[6];?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="menor">
                                            <p>
                                                RG:
                                            </p>
                                        </td>
                                        <td id="maior">
                                            <p>
                                                <?php echo $dados[5];?>             
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="menor">
                                            <p>
                                                CPF:
                                            </p>
                                        </td>
                                        <td id="maior">
                                            <p>
                                            <?php echo $dados[4];?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="menor"> Carteira de Trabalho</td>
                                        <td id="maior"> <p> <?php echo $dados[3] ;?> </p> </td>
                                    </tr>
                                    <tr>
                                        <td id="menor">
                                            <p>
                                                Função:
                                            </p>
                                        </td>
                                        <td id="maior">
                                            <p>
                                                <?php echo $dados[8] ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="menor">
                                            <p>
                                                Status:
                                            </p>
                                        </td>
                                        <td id="maior">
                                            <p>
                                                <?php echo $dados[9] ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="menor"> Cidade:</td>
                                        <td id="maior"> <p> <?php echo $dados_endereco[2]; ?> </p> </td>
                                    </tr>
                                    <tr>
                                        <td id="menor"> Bairro:</td>
                                        <td id="maior"> <p> <?php echo $dados_endereco[3]; ?> </p> </td>
                                    </tr>
                                    <tr>
                                        <td id="menor"> Endereço:</td>
                                        <td id="maior"><p> <?php echo $dados_endereco[4]; ?> </p></td>
                                    </tr>
                                    <tr>
                                        <td id="menor"> Número:</td>
                                        <td id="maior"> <p> <?php echo $dados_endereco[5]; ?> </p></td>
                                    </tr>
                                </table>
                        <?php }?>
                            </div>
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