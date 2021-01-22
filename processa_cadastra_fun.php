<?php 

    $conecta = mysqli_connect("localhost","root","","tech_note");

    $nome = $_POST["nome"]; $sobrenome = $_POST["sobrenome"];

    $rg = $_POST["rg"]; $cpf= $_POST["cpf"]; $carteiraTrabalho = $_POST["carteiraTrabalho"];

    $telefoneContato = $_POST["telefoneContato"]; $telefone = $_POST["telefone"];

    $login = $_POST["login"]; $senha = $_POST["senha"];

    $funcao = $_POST["funcao"];

    $cidade = $_POST["cidade"]; $bairro = $_POST["bairro"]; $endereco = $_POST["endereco"]; $numero = $_POST["numero"];


    $sql_cadastra_fun = "INSERT INTO funcionarios (`cod_fun`,`nome_fun`,`sobre_nome_fun`,`carteira_de_trabalho_fun`,`cpf_fun`,`rg_fun`,`login_fun`,`senha_fun`,`funcao_fun`,`status_fun`)
                     VALUES (NULL,'$nome','$sobrenome','$carteiraTrabalho','$cpf','$rg','$login','$senha','$funcao','ativo'); 
                    ";
    $sql_pega_cod_fun = "SELECT max(cod_fun) AS id FROM funcionarios LIMIT 1";

    $resul_cadastra = mysqli_query ($conecta, $sql_cadastra_fun);

    $resul_pega_cod_fun = mysqli_query ($conecta, $sql_pega_cod_fun);

    $recebe_cod_fun = mysqli_fetch_row($resul_pega_cod_fun);

    if ($resul_cadastra ) { 
        $cod_fun = $recebe_cod_fun[0];
         $sql_cadastra_telefone_fun = "INSERT INTO telefone (`cod_telefone`,`Funcionario_cod_fun`,`numero_fun`,`numero_contato_fun`)
          VALUES (NULL,$cod_fun, '$telefone','$telefoneContato')";

         $sql_cadastra_endereco_fun = "INSERT INTO endereco (`cod_endereco`,`Funcionario_cod_fun`,`cidade_fun`,`bairro_fun`,`endereco_fun`,`casa_numero_fun`) 
          VALUES (NULL,$cod_fun, '$cidade','$bairro','$endereco','$numero')";	

          $resul_cadastra_telefone = mysqli_query($conecta, $sql_cadastra_telefone_fun);
          $resul_cadastra_endereco = mysqli_query($conecta, $sql_cadastra_endereco_fun);

        echo "<script> 
                alert ('$nome cadastrado com sucesso') 
              </script>";
        echo "<script> 
                location.href = ('funcionarios.php') 
            </script>";	
    }else { 		
        echo "<script> 
                alert ('ocorreu um erro no servidor. Tente de novo') 
             </script>";

        echo "<script> 
                location.href = ('cadastra_fun.php') 
              </script>";	
    }	  

?>