<?php 
    if($_SESSION["funcao_fun"] == "administrador"){      
?>
            <ul id="menuL">
                <li><a href="administracao.php"> Administração </a></li>
                <li><a href="venda.php"> Venda </a></li>
                <li><a href="funcionarios.php"> Funcionarios </a></li>
                <li><a href="lista_notebooks.php"> Notebook </a></li>
                <li><a href="relatorio.php"> Relatorio </a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
<?php   }elseif($_SESSION["funcao_fun"] == "venda"){
?>
            <ul id="menuL">
                <li><a href="administracao.php"> Administração </a></li>
                <li><a href="venda.php"> Venda </a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
<?php
        }else{
?>      
        <ul id="menuL">
            <li><a href="administracao.php"> Administração </a></li>
            <li><a href="lista_notebooks.php"> Notebook </a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>        
<?php   
    }
?>