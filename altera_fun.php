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
                    <h1>Altera Funcionarios</h1>
                    <a href="funcionarios.php" id="volta_fun"> voltar </a>
                    <div id="altera_fun" class="centro_div">
                        <div id="altera">
                            <?php
                                $cod = $_GET["cod"];

                                $conecta = mysqli_connect("localhost","root","","tech_note");
                                $sql_consulta = "SELECT cod_fun, nome_fun, sobre_nome_fun, login_fun, senha_fun,
                                    carteira_de_trabalho_fun,rg_fun, cpf_fun, funcao_fun, status_fun FROM funcionarios
                                    WHERE cod_fun = '$cod'";

                                $sql_consulta_telefone = "SELECT numero_fun, numero_contato_fun FROM telefone
                                WHERE Funcionario_cod_fun = '$cod'";

                                $sql_consulta_endereco = "SELECT * FROM endereco WHERE Funcionario_cod_fun = '$cod'";

                                $result_consulta = mysqli_query($conecta, $sql_consulta);

                                $result_consulta_telefone = mysqli_query($conecta, $sql_consulta_telefone);

                                $result_consulta_endereco = mysqli_query($conecta, $sql_consulta_endereco);

                                $dados = mysqli_fetch_row($result_consulta);

                                $dados_telefone = mysqli_fetch_row($result_consulta_telefone);

                                $dados_endereco = mysqli_fetch_row($result_consulta_endereco);
                            ?>
                            <form method="post" action="processa_altera_fun.php">
                                
                                <input type="hidden" name="cod" value="<?php echo "$cod"; ?>">
                                <input type="hidden" name="funcao" value="<?php echo "$dados[7]"; ?>">
                                <?php 
                                    if ($dados[8] != "administrador") 
                                    { 
                                ?>
                                    <table id="tabela_altera" class="tabela_altera_fun">	
                                        <tr>
                                            <td id="altera_esquerda">
                                                <p> Nome: </p>
                                            </td>
                                            <td>
                                            <p> <input type="text" name="nome" value="<?php echo "$dados[1]";?>" required> </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">
                                                Sobrenome:
                                            </td>
                                            <td>
                                            <p> <input type="text" name="sobrenome" value="<?php echo "$dados[2]";?>" required> </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">RG:</td>
                                            <td><input type="text" name="rg" value="<?php echo "$dados[6]" ?>"></td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">CPF:</td>
                                            <td><input type="text" name="cpf" value="<?php echo "$dados[7]" ?>"></td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda"> Carteira de Trabalho</td>
                                            <td><input type="text" name="carteiraTrabalho" value="<?php echo "$dados[5]" ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">
                                                Telefone:
                                            </td>
                                            <td>
                                            <p> <input type="text" name="telefone" value="<?php echo "$dados_telefone[0]";?>" required> </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">
                                                Telefone de Contato:
                                            </td>
                                            <td>
                                            <p> <input type="text" name="telefoneContato" value="<?php echo "$dados_telefone[1]";?>" required> </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">
                                                <p> Login:  </p>
                                            </td>
                                            <td>
                                                <p> <input type="text" name="login" value="<?php echo "$dados[3]";?>" required>  </p>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">
                                                <p> Senha:  </p>
                                            </td>
                                            <td>
                                                <p> <input type="password" name="senha" value="<?php echo "$dados[4]";?>" required>  </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">
                                                <p> funcao:  </p>
                                            </td>
                                            <td>
                                                <p> 
                                                    <input type="radio" name="funcao" value="estoque" 
                                                    <?php
                                                        if ($dados[8] == "estoque") {
                                                            echo "checked";
                                                        }
                                                    ?>> Estoque
                                                    <input type="radio" name="funcao" value="venda"
                                                    <?php
                                                        if ($dados[8] == "venda") {
                                                            echo "checked";
                                                        }
                                                    ?>> Venda  
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">
                                                <p> Status:  </p>
                                            </td>
                                            <td>
                                                <p>
                                                    <select name="status">
                                                        <option value="ativo"
                                                            <?php
                                                                if ($dados[8] == "ativo") {
                                                                    echo "selected";
                                                                }
                                                            ?> > Ativo 
                                                        </option>
                                                        <option value="inativo"<?php
                                                            if ($dados[8] == "inativo") {
                                                                echo "selected";
                                                            }
                                                            ?> > Inativo 
                                                        </option>
                                                    </select>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda"> Cidade:</td>
                                            <td><input type="text" name="cidade" value="<?php echo "$dados_endereco[2]" ?>"></td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda"> Bairro:</td>
                                            <td><input type="text" name="bairro" value="<?php echo "$dados_endereco[3]" ?>"></td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">Endereço:</td>
                                            <td><input type="text" name="endereco" value="<?php echo "$dados_endereco[4]" ?>"></td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">Número:</td>
                                            <td><input type="text" name="numero" value="<?php echo "$dados_endereco[5]" ?>"></td>
                                        </tr>                           
                                        <tr>
                                            <td colspan="2">
                                                <p> <input type="submit" value="Alterar">  </p>
                                            </td>
                                        </tr>
                                    </table>
                                <?php
                                    }
                                    else {
                                ?>
                                    <table id="tabela_altera" class="tabela_altera_fun">	
                                        <tr>
                                            <td id="altera_esquerda">
                                                <p> Nome: </p>
                                            </td>
                                            <td>
                                                <p> <input type="text" value="<?php echo "$dados[1]";?>" disabled="disabled"> </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">
                                                Sobrenome:
                                            </td>
                                            <td>
                                            <p> <input type="text" name="sobrenome" value="<?php echo "$dados[2]";?>" disabled="disabled"> </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">
                                                <p> funcao:  </p>
                                            </td>
                                            <td>
                                                <p> <input type="text" value="<?php echo "$dados[8]";?>" disabled="disabled" > </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">
                                                <p> Login:  </p>
                                            </td>
                                            <td>
                                            <p> <input type="text" value="<?php echo "$dados[3]";?>" disabled="disabled" > </p>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">
                                                <p> Senha:  </p>
                                            </td>
                                            <td>
                                                <p> <input type="password" name="senha" value="<?php echo "$dados[4]";?>" required>  </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="altera_esquerda">
                                                <p> Status:  </p>
                                            </td>
                                            <td>
                                                <p>
                                                <p> <input type="text" value="<?php echo "$dados[8]";?>" disabled="disabled" > </p>
                                                </p>
                                            </td>
                                        </tr>															
                                        <tr>
                                            <td colspan="2">
                                                <p> <input type="submit" value="Alterar"> </p>
                                            </td>
                                        </tr>
                                    </table>
                                <?php
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <!-- DIV RODAPE-->
            <div id="rodape">
                asda ada asd
            </div>
        </div>
    </body>
</html!>