<?php

/*
 * Trata as requisições de página
*/
$folder      = (isset($_GET["fld"])) ? $_GET["fld"]."/" : './';
if (!isset($_GET['pg']) || empty($_GET['pg'])) {
    $arquivo = './welcome.php';
} else {
    $arquivo = $folder.$_GET['pg'] . ".php";
    if (!file_exists($arquivo)) {
        $arquivo = './erro/404.php';
    }
}



/*
 *  captura o arquivo 
*/
ob_start();
    $view = file_get_contents($arquivo);
    echo $view;
    $ob_content_exit = ob_get_contents();
ob_end_clean();



/*
* Inclui as páginas via requisição GET buscando
* no template padrão {{dynamicArea}} e substituindo
*/
$template = file_get_contents('__layout__/default.layout.php');
$layout   = str_replace("{{dynamicArea}}", $ob_content_exit, $template);
echo $layout;
