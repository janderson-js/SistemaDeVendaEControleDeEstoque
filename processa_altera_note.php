<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "tech_note");
				
	
	$cod = $_POST["codigo"];
	$marca = $_POST["marca"];	
	$modelo = $_POST["modelo"];
	$preco = $_POST["preco"];
	$descricao = $_POST["descricao"];
	$especificacao = $_POST["especificacao"];
	$foto = $_FILES["foto"];
	
	
	if ($foto["name"] <> "") {
		$foto_nome = "img/".$foto["name"];		
		move_uploaded_file($foto["tmp_name"], $foto_nome);
	}
	
	$sql_altera = "UPDATE notebooks 		
				   SET 		marca_note ='$marca', 
							modelo_note = '$modelo',
							preco_note ='$preco', 
							descricao_note = '$descricao',
							especificacao_tecnicas_note = '$especificacao',
							endereco_foto_note = '$foto_nome'
				   WHERE 	cod_note = '$cod'";
	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert ('$marca alterado com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('lista_notebooks.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. Dados do notebook não foram alterados. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('lista_notebooks.php') 
			 </script>";
	}
?>