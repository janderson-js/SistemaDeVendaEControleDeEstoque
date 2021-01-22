<?php

    $conectar = mysqli_connect("localhost","root","","tech_note");

    $cod = $_POST["cod"];
    $funcao  = $_POST["funcao"];

    if($funcao == "administrador"){
        $senha = $_POST["senha"];
        $sql_altera = "UPDATE funcionarios
                SET
                    senha_fun = '$senha'
                WHERE
                    cod_fun = '$cod'";
        $sql_result_alteracao = mysqli_query($conectar, $sql_altera);

        if($sql_result_alteracao == true){

            echo "<script>
                    alert('Senha do Administrador alterada com sucesso')
                 </script>";
            echo "<script>
                    location.href = ('funcionarios.php')
                 </script>";   
                 exit();      
        }else{
            echo "<script>
                    alert('Ocorreu um erro no servidor. A senha do Administrador
                            não foi alterada. Tente novamente mais tarde') 
                 </script>";
            echo "<script>
                    location.href = ('funcionarios.php')
                 </script>";
                 exit();
        }
    }else{
        $nome = $_POST["nome"]; $sobrenome = $_POST["sobrenome"];

        $rg = $_POST["rg"]; $cpf= $_POST["cpf"]; $carteiraTrabalho = $_POST["carteiraTrabalho"];
    
        $telefoneContato = $_POST["telefoneContato"]; $telefone = $_POST["telefone"];
    
        $login = $_POST["login"]; $senha = $_POST["senha"];
    
        $funcao = $_POST["funcao"];

        $status = $_POST["status"];
    
        $cidade = $_POST["cidade"]; $bairro = $_POST["bairro"]; $endereco = $_POST["endereco"]; $numero = $_POST["numero"];

            $sql_consulta = "SELECT login_fun FROM funcionarios 
                                    WHERE login_fun = '$login'
                                    AND cod_fun <> '$cod'";
        
            $sql_result_consulta = mysqli_query($conectar, $sql_consulta);
            


            $linhas = mysqli_num_rows($sql_result_consulta);

            if($linhas == 1 ){

                echo "<script>
                        alert('login do Funcionário já existe. Tente novamente!')
                     </script>";
                echo "<script>
                        location.href = ('funcionarios.php?cod=$cod')
                     </script>";
            }else{

                    $sql_altera = "UPDATE funcionarios
                                    SET nome_fun = '$nome',
                                        sobre_nome_fun = '$sobrenome',
                                        carteira_de_trabalho_fun = '$carteiraTrabalho',
                                        cpf_fun = '$cpf',
                                        rg_fun = '$rg',
                                        funcao_fun = '$funcao',
                                        login_fun = '$login',
                                        senha_fun = '$senha',
                                        status_fun = '$status'
                                    WHERE cod_fun = '$cod'";
                    $sql_altera_telefone = "UPDATE telefone
                                            SET numero_fun = '$telefone',numero_contato_fun = '$telefoneContato'
                                            WHERE funcionario_cod_fun = '$cod'";
                    $sql_altera_endereco = "UPDATE endereco
                                            SET cidade_fun = '$cidade', 
                                                bairro_fun = '$bairro', 
                                                endereco_fun ='$endereco',
                                                casa_numero_fun = '$numero'
                                            WHERE funcionario_cod_fun = '$cod'";

            $sql_result_alteracao = mysqli_query($conectar,$sql_altera);

            $sql_result_alteracao_telefone = mysqli_query($conectar, $sql_altera_telefone);

            $sql_result_alteracao_endereco = mysqli_query($conectar,$sql_altera_endereco);
            
            if($sql_result_alteracao && $sql_result_alteracao_telefone && $sql_result_alteracao_endereco == true){

                echo "<script>
                        alert('$nome aleterados com sucesso')
                    </script>";
                echo "<script>
                        location.href = ('funcionarios.php')
                     </script>";
           }
        }
    }
?>