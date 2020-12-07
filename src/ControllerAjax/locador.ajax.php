<?php

require_once '../require.php';

define('TABELA', 'locador');

$dataPost = $st->Clean($_POST);

if(isset($dataPost['action'])){
    $action = $dataPost['action'];
    unset($dataPost['action']);
}

switch ($action) {
    case 'atualizar':
        $update = $db->Update(TABELA, $_POST, "id = {$dataPost['id']}");
        $result = ($update) ? true : false;
        echo $result;
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
            echo $result;
        }
        break;


    case 'ler':        
        $read = $db->Read(TABELA);
        $rowTable = "";
        foreach($read as $row){
            $rowTable .= "
            <tr>
                <th scope='row'>{$row['id']}</th>
                <td>{$row['nome']}</td>
                <td>{$row['email']}</td>
                <td>{$row['telefone']}</td>
            </tr>
            ";            
        }
        echo $rowTable;
        break;


    default:
        echo "Aguardando";
        break;
}