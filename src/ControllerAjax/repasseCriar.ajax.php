<?php

require_once '../require.php';

define('TABELA', 'repasse');



switch ($_POST['action']) {
    case 'criar':
        $arr = [];
        for ($i = 0; $i < count($_POST['arrRepasse']); $i++) {
            $arr = [
                "indice" => $i,
                "id_contrato" => $_POST['id'],
                "valor_repasse" => $ft->FormatMoneyDB($_POST['arrRepasse'][$i]['valor']['name']),
                "data"  => $ft->FormatDataEua($_POST['arrRepasse'][$i]['data']['name']),
                "status" => "EM ABERTO"
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
