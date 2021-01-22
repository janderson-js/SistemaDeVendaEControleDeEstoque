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
                    <h1>Dados do Notebook</h1>
                    <div id="lista_note">
                        <div id="exibe_note">
                            <?php 
                                $cod = $_GET["cod"];

                                $conecta = mysqli_connect("localhost","root","","tech_note");
                                $sql_consulta = "SELECT cod_note, marca_note, modelo_note, preco_note, descricao_note, especificacao_tecnicas_note, endereco_foto_note FROM notebooks
                                    WHERE cod_note = '$cod'";
                                $result_consulta = mysqli_query($conecta, $sql_consulta);

                                $dados = mysqli_fetch_row($result_consulta);
                            ?>
                            <div class="exibe_dados_note">
                            <p> <a href="lista_notebooks.php" id="volta_exibe_note"> Voltar </a> </p>
                                <table id="exibe_note">
                                    <tr>
                                        <td colspan="2" align="center">
                                            <img  width="50%" height="80%" src="<?php echo "$dados[6]"; ?>">   
                                        </td>
                                    </tr>
									<tr>
										<td align="center">
										   <?php
										      echo"<p> Marca: $dados[1]</p>";
										   ?>
										</td>
										<td align="center">
										     <?php
										      echo"<p> Modelo: $dados[2] </p>";
										   ?>
										</td>
									</tr>
									<tr>
										<td align="center">
										   <?php
												echo"<p> Preço: $dados[3]</p>";
										   ?>
										</td>
										<td nowrap="nowrap" align="center">
										    <?php
											  echo"<p> Descrição: $dados[4]</p>";
											?>
										</td>
									</tr>
									</tr>
										<tr colspan="2">
									       <td colspan="2" align="center">
									         <p>
											   <?php
													echo "<p> Especificações Técnicas: $dados[5] </p>";
										      ?>
										  </p>
									   </td>
									</tr>
                                </table>
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