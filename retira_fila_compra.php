<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "tech_note");
				
	
	$cod = $_GET["cod"];	
	
	$sql_altera = "UPDATE notebooks 		
				   SET 		fila_compra_note = 'N'
				   WHERE 	cod_note = '$cod'";
	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert ('Notebook retirado da fila de compra com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('venda.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. O Notebook não foi retirado da fila de compras. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('venda.php') 
			 </script>";
	}
?>