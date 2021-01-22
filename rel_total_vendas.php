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
                        <ul id="menuL">
                            <li><a href="administracao.php"> Administração </a></li>
                            <li><a href="venda.php"> Venda </a></li>
                            <li><a href="funcionarios.php">Funcionários </a></li>
                            <li><a href="notebook.php"> Notebook </a></li>
                            <li><a href="relatorio.php"> Relatório </a></li>
                            <li><a href="logout.php">Sair</a></li>
                        </ul>
                    </div>
                </div>
                    <!-- DIV CONTEUDO ESPECIFICO -->
                <div id="conteudo_especifico">
                    <ul id="menu_conteudo">
                        <li>Olá, <?php include "valida_login.php";?> </li>
                    </ul>
					<div class="div_central centralizar">
					<h1> Faturamento </h1>
					<table class="tabela_fun" >
                     <tr>
					    <p class="cadastrar"><a href="relatorio.php">Voltar ao Relatório   </a></p>
					 </tr>	
					</table>
					<?php
					
						$conectar = mysqli_connect ("localhost", "root", "", "tech_note");			
						
						$data = date ('d/m/Y');
						
						$sql_consulta_total_vendas = "SELECT preco_note
													  FROM notebooks
													  WHERE fila_compra_note = 'V'";
						
						$resultado_consulta = mysqli_query ($conectar, $sql_consulta_total_vendas);		
							
				
						$valoTotal = 0;
						while ($dados_total_vendas = mysqli_fetch_row ($resultado_consulta))
						{
							$valoTotal = $valoTotal + $dados_total_vendas[0];
					
						}
					?>
					
					<p> Total de vendas até a presente data: <?php echo $data." : ".$valoTotal."$"; ?> </p>
					
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