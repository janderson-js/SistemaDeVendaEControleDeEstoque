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
                    <h1>Cadastrar Notebook</h1>
                    <div id="lista_note">
                        <div id="exibe_note">
                            <div >
								<form method="post" action="processa_cadastra_note.php" enctype="multipart/form-data">
									<table id="form_exibe_note">	
										<tr>
											<td id="menor2">
												 Marca: 
											</td>
											<td>
												<p> <input type="text" name="marca" placeholder="marca" required> </p>
											</td>
										</tr>
										<tr>
											<td  id="menor2">
												<p> Modelo: </p>
											</td>
											<td> 
												<p> <input type="text" name="modelo" placeholder="modelo" required> </p>
											</td>								
										</tr>
										<tr>
											<td  id="menor2"> 
												<p> Preço: </p>
											</td>
											<td>
												<p> <input type="text" name="preco" placeholder="preço" required> </p>
											</td>
										</tr>
										<tr>
											<td>
												Descrição:
											</td>
											<td>
												<textarea name="descricao"   placeholder="descrição"required></textarea>
											</td>
										</tr>
										<tr>
											<td  id="menor2">
												<p> Especificações Técnicas:  </p>
											</td>
											<td>
												<textarea name="especificacao"  placeholder="especificações"  required></textarea>
											</td>
										</tr>
										<tr>
											<td  id="menor2"> 
												<p> Foto: </p>
											</td>
											<td>
												<p> <input type="file" name = "foto" required> </p>
											</td>
										</tr>
										<tr>
											<td colspan="2" align="center">
												<p><input type="reset"  value="Limpar campos" /> <input type="submit" value="Cadastrar Notebook"> </p>
											</td>
										</tr>
									</table>
					    		</form>
								<a href="lista_notebooks.php"> Voltar </a>
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