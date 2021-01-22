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
                    <h1>Cadastrar Funcionarios</h1>
                    <a href="funcionarios.php" id="volta_fun"> voltar </a>
                    <div id="altera_fun">
                        <div id="cadastra">
                            <form action="processa_cadastra_fun.php" method="post">
                                <table id="form_cadastra">
                                    <tr>
                                        <td align="center" colspan="2"><h6>Dados Funcionário:</h6> </td>
                                    </tr>
                                    <tr>
                                        <td>Nome:</td>
                                        <td>
                                            <p> <input type="text" name="nome" placeholder="Ex: José " required> </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sobrenome:</td>
                                        <td>
                                            <input type="text" name="sobrenome" placeholder="Ex: Alves de Souza" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>RG:</td>
                                        <td>
                                            <input type="text" name="rg" placeholder="Ex: 0.000.000" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CPF:</td>
                                        <td>
                                            <input type="text" name="cpf" placeholder="Ex: 000.000.000-00" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Carteira de Trabalho</td>
                                        <td><input type="text" name="carteiraTrabalho" placeholder="Ex: 00.000.00000" required></td>
                                    </tr>
                                    <tr>
                                        <td>Telefone de Contato:</td>
                                        <td>
                                            <input type="text" name="telefoneContato" placeholder="Ex: 61 9 0000-0000" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Telefone:</td>
                                        <td><input type="text" name="telefone" placeholder="Ex: 61 9 0000-0000" required></td>
                                    </tr>
                                    <tr>
                                        <td>Login:</td>
                                        <td>
                                        <input type="text" name="login" placeholder="Login Funcionário" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Senha:</td>
                                        <td>
                                            <input type="password" name="senha" placeholder="*********" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Função:</td>
                                        <td>
                                            <input type="radio" name="funcao" value="estoque" checked
                                                > Estoque
                                            <input type="radio" name="funcao" value="venda"
                                                >Venda  
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cidade:</td>
                                        <td>
                                            <input type="text" name="cidade" placeholder="Ex: Brasília" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Bairro:</td>
                                        <td>
                                            <input type="text" name="bairro" placeholder="Ex: Recanto das Emas" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>endereço:</td>
                                        <td><input type="text" name="endereco" placeholder="Ex: Qd 300 Cj 8" required></td>
                                    </tr>
                                    <tr>
                                      <td>número:</td>
                                      <td><input type="text" name="numero" placeholder="Ex: 21" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center"><input type="reset"  value="Limpar campos" /> <input type="submit" value="Cadastrar" id="btn_cadastrar"></td>
                                    </tr>
                                </table>
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