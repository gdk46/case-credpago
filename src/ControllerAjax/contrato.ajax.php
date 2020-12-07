<?php

require_once '../require.php';

define('TABELA', 'contrato');

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
            $readLocador = $db->Read('locador', "WHERE id = {$row['id_locador']}");
            
            foreach($readLocador as $rowLocador){
                $readLocatario = $db->Read('locatario', "WHERE id = {$row['id_locatario']}");

                foreach($readLocatario as $rowLocatario){
                    $rowTable   .= "
                    <tr>
                        <th scope='row'>{$row['id']}</th>
                        <td>{$rowLocador['nome']}</td>
                        <td>{$rowLocatario['nome']}</td>
                        <td>{$ft->FormatMoney($row['taxa_administrativa'])}</td>
                        <td>{$ft->FormatMoney($row['valor_condominio'])}</td>
                        <td>{$ft->FormatMoney($row['valor_aluguel'])}</td>
                        <td>{$ft->FormatDataBr($row['data_inicio'])}</td>
                        <td>{$ft->FormatDataBr($row['data_fim'])}</td>
                    </tr>
                    ";
                }
            }
        }
        echo $rowTable;
        break;


    default:
        echo "Aguardando";
        break;
}