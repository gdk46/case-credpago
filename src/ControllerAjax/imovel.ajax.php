<?php

require_once '../require.php';

define('TABELA', 'imovel');

$dataPost = $st->Clean($_POST);

if(isset($dataPost['action'])){
    $action = $dataPost['action'];
    unset($dataPost['action']);
}

switch ($action) {
    case 'atualizar':
        $update = $db->Update(TABELA, $_POST, "id = {$dataPost['id']}");
        $result = ($update) ? true : false;
        break;


    case 'criar':
        $create = $db->Create(TABELA, $_POST);
        $result = ($create) ? true : false;
        echo $result;
        break;


    case 'deletar':
        $query = "id = {$dataPost['id']}";
        $read  = $db->Read(TABELA, "WHERE ".$query);
        
        if($db->NumQuery($read)){
            $delete      = $db->Delete(TABELA, $query);
            $result = ($delete) ? true : false;
        }
        break;


    case 'ler':
        $read = $db->Read(TABELA);
        $rowTable = "";
        foreach($read as $row){
            $readLocador = $db->Read('locador', "WHERE id = {$row['id_proprietario']}");

            foreach($readLocador as $rowLocador){
                $rowTable   .= "
                <tr>
                    <th scope='row'>{$row['id']}</th>
                    <td>{$row['logradouro']}</td>
                    <td>{$row['cidade']}</td>
                    <td>{$row['bairro']}</td>
                    <td>{$row['uf']}</td>
                    <td>{$rowLocador['nome']}</td>
                </tr>
                ";
            }        
        }
        echo $rowTable;
        break;


    default:
        echo "Aguardando";
        break;
}