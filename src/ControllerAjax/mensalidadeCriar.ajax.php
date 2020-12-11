<?php

require_once '../require.php';

define('TABELA', 'mensalidade');

switch ($_POST['action']) {
    case 'criar':
        $arr = [];
        for ($i=0; $i < count($_POST['arrMensalidade']); $i++) { 
            $arr = [
              "indice" => $i,
              "id_contrato" => $_POST['id'],
              "valor_mensalidade" => $ft->FormatMoneyDB($_POST['arrMensalidade'][$i]['valor']['name']),
              "data"  => $ft->FormatDataEua($_POST['arrMensalidade'][$i]['data']['name']),
              "status"=> "EM ABERTO"
            ];
        
            $create = $db->Create(TABELA, $arr);
            $result = ($create) ? true : false;
        }        
        echo $result;
        break;

    default:
        echo "Aguardando";
        break;
}
