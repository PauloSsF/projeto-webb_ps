<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require("bd/conexao.php");

?>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Site</title>

        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>

    <body>

        <div class="container">

            <header>
                <h1>Casa dos Vilões</h1>
            </header>

            <div class="menu">
                <ul>
                    <a href="?pg=inicio"><li><b>Início</b></li></a>
                    <a href="?pg=sobre"><li><b>Sobre</b></li></a>
                    <a href="?pg=contato/formulario"><li><b>Contato</b></li></a>
                    <a href="?pg=itens/cadastro"><li><b>Cadastro de Vilões</b></li></a>
                    <a href="?pg=itens/buscaitens"><li><b>Listagem de Violões</b></li></a>
                    <?php 
                        if(!isset($_SESSION["nome"])){
                    ?>
                        <a href="?pg=login/formulario"><li><b>Login</b></li></a>
                    <?php
                        }
                        else{
                    ?>
                        <a href="?pg=area_restrita"><li><b>Área restrita</b></li></a>
                    <?php
                        }
                    ?>
                </ul>
            </div>

            <main>
            
                <?php

                    /* Operador ternário para verificar se o pg está setado no GET e não está vazio
                        Caso verdadeiro: usa o valor do GET["pg"]
                        Caso falso: usa o valor "inicio"
                    */
                    $pg = (isset($_GET["pg"]) && !empty($_GET["pg"])) ? $_GET["pg"] : "inicio";

                    include("paginas/".$pg.".php");

                ?>

            </main>

            <footer>
                <h4>Copyright &copy; Paulo Sergio - 2021</h4>
            </footer>

        </div>

    </body>
    
</html>