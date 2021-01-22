<?php
	session_start();

	$conectar = mysqli_connect ("localhost", "root", "", "tech_note");
	
	$marca = $_POST["marca"];
	$modelo = $_POST["modelo"];
	$preco = $_POST ["preco"];
	$descricao = $_POST["descricao"];
	$especificacao = $_POST["especificacao"];
	$foto = $_FILES["foto"];
	
	
	$foto_nome = "img/".$foto["name"];
	move_uploaded_file($foto["tmp_name"], $foto_nome);
	
	$sql_cadastrar = "INSERT INTO notebooks (marca_note, 
											modelo_note,
											preco_note,
											descricao_note,
											especificacao_tecnicas_note, 
											endereco_foto_note) 
					  VALUES 			   ('$marca',
											'$modelo', 
											'$preco',
											'$descricao',
											'$especificacao',
											'$foto_nome')";
											
	$sql_resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);
	
	if ($sql_resultado_cadastrar == true) { 	
		echo "<script>
				alert ('$marca cadastrado com sucesso') 
			  </script>";
		echo "<script>
				location.href = ('lista_notebooks.php') 
			  </script>";		
	}
	else { 	
		echo "<script> 
				alert ('ocorreu um erro no servidor ao tentar cadastrar') 
			  </script>";
		
		echo "<script> 
				location.href = ('cadastra_note.php') 
			  </script>";
	
	}
?>