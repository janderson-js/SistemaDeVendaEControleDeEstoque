<?php
	session_start();

	/* conexão com o banco de dados */
	$conectar = mysqli_connect ("localhost", "root", "", "tech_note");
	
	$login = $_POST["login"];
	$senha = $_POST["senha"];	

	/* realiza a consulta no banco de dados */	
	$sql_consulta = "SELECT cod_fun, login_fun, nome_fun, sobre_nome_fun, funcao_fun FROM funcionarios
					 WHERE 
					       login_fun = '$login' 
					 AND 
						   senha_fun = '$senha'";
						   
	/* armazena  o resultado da consulta do banco de dados */				 
	$result_consulta = mysqli_query($conectar, $sql_consulta);

	/* retorna um valor caso encontre as informações no banco de dados */
	$linhas = mysqli_num_rows($result_consulta);
	
	/* faz a verificação do retorno do banco de dados 
	e redireciona para proxima pagina caso estaja todo certo ou emite uma menssagem 
	caso os dados não estejam no banco  */

	if ($linhas == 1) {	
		$dados = mysqli_fetch_row($result_consulta);
		$_SESSION["cod_fun"] = $dados[0];
		$_SESSION["login_fun"] = $dados[1];
		$_SESSION["nome_fun"] = $dados[2];
		$_SESSION["sobre_nome_fun"] = $dados[3];
		$_SESSION["funcao_fun"] = $dados[4];		
		
		echo "<script> 
					location.href = ('administracao.php')
			  </script>";
	}
	else {
		echo "<script> 
				  alert ('Usúario ou Senha Incorretos! Digite Novamente!!') 
			  </script>";
		echo "<script> location.href = ('index.php') </script>";
	}
?>