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
                    <h1>Alterar Notebook</h1>
					<?php
					    $conecta = mysqli_connect("localhost","root","","tech_note");
						
						$cod = $_GET["cod"];
						
						$sql_consulta = "SELECT cod_note, marca_note, modelo_note, preco_note, descricao_note, especificacao_tecnicas_note, endereco_foto_note FROM notebooks
                                    WHERE cod_note = '$cod'";
						
					    $result_consulta = mysqli_query($conecta, $sql_consulta);

                        $dados = mysqli_fetch_row($result_consulta);
					?>
                    <div id="lista_note">
                        <div id="exibe_note">

                            <div id="">
                            <form method="post" action="processa_altera_note.php" enctype="multipart/form-data">
							  <input type="hidden" name="codigo" value="<?php echo "$cod"; ?>">
						   <table id="form_exibe_note">	
							<tr>
								<td id="menor2">
									<p> Marca: </p>
								</td>
								<td>
									<p> <input type="text" name="marca" required value="<?php echo "$dados[1]"; ?>" > </p>
								</td>
							</tr>
							<tr>
								<td id="menor2">
									<p> Modelo: </p>
								</td>
								<td> 
									<p> <input type="text" name="modelo" required value="<?php echo "$dados[2]"; ?>" > </p>
								</td>								
							</tr>
							<tr>
								<td id="menor2"> 
									<p> Preço: </p>
								</td>
								<td>
									<p> <input type="text" name="preco" required value="<?php echo "$dados[3]"; ?>" > </p>
								</td>
							</tr>
							<tr>
								<td id="menor2">
									<p> Descrição:  </p>
								</td>
								<td>
								   <textarea name="descricao" required><?php echo "$dados[4]"; ?></textarea>
								</td>
							</tr>
							 <tr>
								<td id="menor2">
									<p> Especificações Técnicas:  </p>
								</td>
								<td>
								   <textarea name="especificacao" required><?php echo "$dados[5]"; ?></textarea>
								</td>
							</tr>
							<tr>
								<td id="menor2"> 
									<p> Foto: </p>
								</td>
								<td>
									<p> <input type="file" name = "foto" class="file"></p>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="center">
									<p><input type="reset"  value="Limpar campos" /> <input type="submit" value="Alterar Notebook"> </p>
								</td>
							</tr>
						</table>
					</form>
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