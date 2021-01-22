<?php

	/* faz a checagem da variavel de sessão */
	if ( isset($_SESSION["login_fun"]) ) {
		/* caso  seja verdadeiro  irá mostrar na tela o nome da pessoa  */
		echo $_SESSION["nome_fun"]." ". $_SESSION["sobre_nome_fun"];
		
	}
	else {
		/* caso seja negativo ira redirecionar para index */
		echo "<script> 
				alert ('Você não está logado!!!') 
			  </script>";	
		echo "<script> 
				location.href = ('index.php') 
			  </script>";
	}
?>